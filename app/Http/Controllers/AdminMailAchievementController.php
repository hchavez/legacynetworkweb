<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendOrganizationMessageRequest;
use App\Http\Requests\UserRequest;
use App\Repositories\AchievementLevelsRepository;
use App\Repositories\BonusPathsRepository;
use App\Services\UsersServices;
use App\Services\AchievementLevelsServices;
use App\User;
use Illuminate\Http\Request;
use Mail;
use App\Mail\MemberAchievementApproved;
use App\Mail\SponsorAchievementByMemberApproved;


class AdminMailAchievementController extends Controller
{
    /**
     * @var UsersServices
     */
    private $usersServices;


     /**
     * @var AchievementLevelsServices
     */
    private $achievementLevelsServices;

    /**
     * @var AchievementLevelsRepository
     */
    private $achievementLevelsRepository;
    /**
     * @var BonusPathsRepository
     */
    private $bonusPathsRepository;


    public function __construct(
        UsersServices $usersServices,
        AchievementLevelsServices $achievementLevelsServices,
        AchievementLevelsRepository $achievementLevelsRepository,
        BonusPathsRepository $bonusPathsRepository
    )
    {
        $this->usersServices = $usersServices;
        $this->achievementLevelsServices = $achievementLevelsServices;
        $this->achievementLevelsRepository = $achievementLevelsRepository;
        $this->bonusPathsRepository = $bonusPathsRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('legacy_admin.mail_achievement');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $distributor = new User();
        $distributor->_method = "POST";
        $distributor->purl = uniqid();
        $distributor->status = 'PENDING';

        $data['data'] = $distributor;
        $data['achievementLevels'] = $this->achievementLevelsRepository->all();
        $data['roles'] = [];

        return view('legacy_admin.legacy_distributor_form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $data = $this->usersServices->create($request->except(['_method', 'password_confirmation']));

        return response(['status' => 'ok', 'message' => 'created', 'data' => $data]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $distributor = $this->usersServices->find($id);
    
        Mail::to($distributor)->send(new EliteChallengeDay1Email());

         $cvMapping = [
            '13' => 400000,
            '12' => 300000,
            '11' => 200000,
            '10' => 100000,
            '9' => 60000,
            '8' => 30000,
            '7' => 14000,
            '6' => 6000,
            '5' => 4500,
            '4' => 3000,
            '3' => 1500,
            '2' => 500,
        ];

     /**
     * Send out email
     *
     */

        foreach ($cvMapping as $key => $value) {
            //if ($this->user->achievement_level_id >= $key) return $data;

            if ($distributor['achievement_level_id'] <= $key && $distributor['synergy_actual_value'] >= $value) {

                $achievementLevel = $this->achievementLevelsServices->find($key);

                Mail::to($distributor['email'])->send(new MemberAchievementApproved($distributor, $achievementLevel));
               
                $sponsor = $distributor['referrer_id'];

                $sponsorEmail = User::select('email')->where('id', $distributor['referrer_id'])->first();

                if ($sponsor) Mail::to($sponsorEmail['email'])->send(new SponsorAchievementByMemberApproved($distributor,  $sponsorEmail, $achievementLevel));

                User::where('id', '=', $id)->update(array('achievement_level_id' => $key,'mail_achievement' => '0')); 
                
               //$savedb = DB::table('users')->where('id', $id)->update(['achievement_level_id' => $key,'mail_achievement' => '0']);

               //var_dump($savedb); exit();
               
               $message = 'Mail Achievement successfully sent!';
               $tag = 'success';
            }
        }
        
         return back()->with($tag, $message);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $data = $this->usersServices->update($request->except(['_method', 'password_confirmation']), $id);
        return response(['status' => 'ok', 'message' => 'updated', 'data' => $data]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = $this->usersServices->delete($id);
        return response(['status' => 'ok', 'message' => 'updated', 'data' => $data]);
    }

    public function showSendEmail()
    {
        $data = [];
        $data['notify'] = false;
        return view('legacy_admin.legacy_send_emails', $data);
    }

    public function processSendEmail(SendOrganizationMessageRequest $request)
    {
        $data = [];
        $data['notify'] = true;
        $this->usersServices->sendOrganizationMessage($request->all());
        return view('legacy_admin.legacy_send_emails', $data);
    }

    public function mce_image_upload(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        $image = $request->file('file');

        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

        $destinationPath = public_path('/uploads/images');

        $image->move($destinationPath, $input['imagename']);

        return response()->json([
            'status' => 'ok',
            'message' => 'uploaded',
            'location' => url('/') . '/uploads/images/' . $input['imagename'],
        ]);


    }
}
