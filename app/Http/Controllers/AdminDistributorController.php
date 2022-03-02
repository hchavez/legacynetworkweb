<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendOrganizationMessageRequest;
use App\Http\Requests\UserRequest;
use App\Repositories\AchievementLevelsRepository;
use App\Repositories\BonusPathsRepository;
use App\Services\UsersServices;
use App\User;
use Illuminate\Http\Request;

class AdminDistributorController extends Controller
{
    /**
     * @var UsersServices
     */
    private $usersServices;
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
        AchievementLevelsRepository $achievementLevelsRepository,
        BonusPathsRepository $bonusPathsRepository
    )
    {
        $this->usersServices = $usersServices;
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
        return view('legacy_admin.legacy_distributors');
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
        $distributor->_method = 'PUT';
        $roles = $distributor->getRoleNames()->toArray();

        $data['data'] = $distributor;
        $data['achievementLevels'] = $this->achievementLevelsRepository->all();
        $data['bonusPaths'] = $this->bonusPathsRepository->all();
        $data['roles'] = $roles;

        return view('legacy_admin.legacy_distributor_form', $data);
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
        var_dump($data);
        //return response(['status' => 'ok', 'message' => 'updated', 'data' => $data]);
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
