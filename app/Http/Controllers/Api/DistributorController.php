<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SetPlacementRequest;
use App\Http\Traits\UpdatesPayments;
use App\Repositories\UsersRepository;
use App\Repositories\AchievementLevelsRepository;
use App\Repositories\AdvancedAchievementsRepository;
use App\Repositories\NotificationMessagesRepository;
use App\Repositories\MeetingsRepository;
use App\Repositories\UserMeetingsRepository;
use App\Repositories\UserSuccessCompassRepository;
use App\Services\MeetingsServices;
use App\Services\UsersServices;
use App\Services\AchievementLevelsServices;
use App\Services\AdvancedAchievementsServices;
use App\Services\BonusPathsServices;
use App\Services\SuccessCompassServices;
use App\Services\UserSuccessCompassServices;
use App\Services\TreeDetailsServices;
use App\Transformers\AchievementLevelsTransformer;
use App\Transformers\AdvancedAchievementsTransformer;
use App\Transformers\BonusPathsTransformer;
use App\Mail\MeetingCreated;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Jobs\ScheduleChallengeWelcomeEmail;
use App\Mail\EliteChallengeSponsorMail;
use App\Mail\EliteChallengeWelcomeMail;
use App\Mail\EliteChallengeDay1Email;
use App\Jobs\ScheduleChallengeDay15Email;
use App\Jobs\ScheduleChallengeDay1Email;
use App\Jobs\ScheduleChallengeDay21Email;
use App\Jobs\ScheduleChallengeDay2Email;
use App\Jobs\ScheduleChallengeDay3Email;
use App\Jobs\ScheduleChallengeDay4Email;
use App\Jobs\ScheduleChallengeDay5Email;
use App\Jobs\ScheduleChallengeDay6Email;
use App\Jobs\ScheduleChallengeDay7Email;
use App\Jobs\ScheduleChallengeDay8Email;
use Mail;
use App\Repositories\NotificationMessagesRepository;
use App\Services\UsersServices;
use App\Repositories\SendInvitesRepository;
use App\Services\SendInvitesServices;
use App\Models\SendInvites;
use App\Models\SendInvitesTitle;
use Validator;
use App\Mail\SendInvitesMail;
use Twilio\Rest\Client;


class DistributorController extends Controller
{
   
   /**
     * @var UsersServices
     */
    private $usersServices;
    /**
     * @var UserSuccessCompassServices
     */
    private $userSuccessCompassService;

    /** @var array $this ->data */
    private $data = [];
    /**
     * @var AchievementLevelsServices
     */
    private $achievementLevelsServices;
    /**
     * @var AdvancedAchievementsServices
     */
    private $advancedAchievementsServices;
    /**
     * @var TreeDetailsServices
     */
    private $treeDetailsServices;
    /**
     * @var SuccessCompassServices
     */
    private $successCompassServices;
    /**
     * @var BonusPathsServices
     */
    private $bonusPathsServices;
        /**
     * @var SendInvitesServices
     */
    private $sendInvitesServices;

    /**
     * @var NotificationMessagesRepository
     */
    private $notificationMessagesRepository;

    /**
     * @param UsersServices $usersServices
     * @param UserSuccessCompassServices $userSuccessCompassServices
     * @param AchievementLevelsServices $achievementLevelsServices
     * @param AdvancedAchievementsServices $advancedAchievementsServices
     * @param TreeDetailsServices $treeDetailsServices
     * @param SuccessCompassServices $successCompassServices
     * @param MeetingsServices $meetingsServices
     * @param MeetingsRepository $meetingsRepository
     * @param UserMeetingsRepository $userMeetingsRepository
     */
    public function __construct(
        UsersServices $usersServices,
        UserSuccessCompassServices $userSuccessCompassServices,
        AchievementLevelsServices $achievementLevelsServices,
        AdvancedAchievementsServices $advancedAchievementsServices,
        TreeDetailsServices $treeDetailsServices,
        SuccessCompassServices $successCompassServices,
        BonusPathsServices $bonusPathsServices,
        MeetingsServices $meetingsServices,
        MeetingsRepository $meetingsRepository,
        UserMeetingsRepository $userMeetingsRepository,
        SendInvitesServices $sendInvitesServices, 
        NotificationMessagesRepository $notificationMessagesRepository
    )
    {
        $this->usersServices = $usersServices;
        $this->userSuccessCompassService = $userSuccessCompassServices;
        $this->achievementLevelsServices = $achievementLevelsServices;
        $this->advancedAchievementsServices = $advancedAchievementsServices;
        $this->treeDetailsServices = $treeDetailsServices;
        $this->successCompassServices = $successCompassServices;
        $this->bonusPathsServices = $bonusPathsServices;
        $this->meetingsServices = $meetingsServices;
        $this->meetingsRepository = $meetingsRepository;
        $this->userMeetingsRepository = $userMeetingsRepository; 
        $this->sendInvitesServices = $sendInvitesServices;
        $this->notificationMessagesRepository = $notificationMessagesRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
    }


    public function getAchievementLevels()
    {
        /** @var User $user */
        $user = Auth::user();
        $data['user'] = $user;
        $data = $this->achievementLevelsServices->achievementLevels()->transformWith(new AchievementLevelsTransformer())->toArray();

        return response()->json($data);
    }

     public function getAdvancedAchievements()
    {
        /** @var User $user */
        $user = Auth::user();

        $data = $this->advancedAchievementsServices->achievementLevels()->transformWith(new AdvancedAchievementsTransformer())->toArray();

        return response()->json($data);
    }

     public function getBonusPaths()
    {
        /** @var User $user */
        $user = Auth::user();

        $data = $this->bonusPathsServices->achievementLevels()->transformWith(new BonusPathsTransformer())->toArray();

        return response()->json($data);
    }


      public function sendEliteHealthChallengeEmail()
    {
        $user = Auth::user();

        ScheduleChallengeWelcomeEmail::dispatch($user);
        ScheduleChallengeDay1Email::dispatch($user);
        ScheduleChallengeDay2Email::dispatch($user)->delay(now()->addDays(1));
        ScheduleChallengeDay3Email::dispatch($user)->delay(now()->addDays(2));
        ScheduleChallengeDay4Email::dispatch($user)->delay(now()->addDays(3));
        ScheduleChallengeDay5Email::dispatch($user)->delay(now()->addDays(4));
        ScheduleChallengeDay6Email::dispatch($user)->delay(now()->addDays(5));
        ScheduleChallengeDay7Email::dispatch($user)->delay(now()->addDays(6));
        ScheduleChallengeDay8Email::dispatch($user)->delay(now()->addDays(7));
        ScheduleChallengeDay15Email::dispatch($user)->delay(now()->addDays(14));
        ScheduleChallengeDay21Email::dispatch($user)->delay(now()->addDays(20));

         return response([
            'message' => 'Success. Your Elite Health Challenge Welcome and Day 1 emails have been sent.',
        ], 200);

    }


      public function resendHealthChallengeEmails(Request $request)
    {
        $user = User::find($request->input('id'));
        Mail::to($user->email)->send(new EliteChallengeWelcomeMail());
        Mail::to($user->email)->send(new EliteChallengeDay1Email());
        ScheduleChallengeDay2Email::dispatch($user)->delay(now()->addDays(4));
        ScheduleChallengeDay3Email::dispatch($user)->delay(now()->addDays(5));
        ScheduleChallengeDay4Email::dispatch($user)->delay(now()->addDays(6));
        ScheduleChallengeDay5Email::dispatch($user)->delay(now()->addDays(7));
        ScheduleChallengeDay6Email::dispatch($user)->delay(now()->addDays(8));
        ScheduleChallengeDay7Email::dispatch($user)->delay(now()->addDays(9));
        ScheduleChallengeDay8Email::dispatch($user)->delay(now()->addDays(10));
        ScheduleChallengeDay15Email::dispatch($user)->delay(now()->addDays(17));
        ScheduleChallengeDay21Email::dispatch($user)->delay(now()->addDays(23));

         
         return response([
            'message' => 'Success. Your Elite Health Challenge successfully send.',
        ], 200);

    }


      public function notifySponsorForCertification()
    {
        $user = Auth::user();
        $sponsor = $user->sponsor;
        Mail::to($sponsor->email)->send(new MeetingCreated($user));

         return response([
            'message' => 'Success. Your Elite Health Challenge Welcome and Day 1 emails have been sent.',
        ], 200);
    }

      public function getHealthChallengeParticipants()
    {
        $user = user();
        $data['user'] = $user;
        $data['in_training'] = false;

        if (!$user->is_training_done) {
            $data['in_training'] = true;
        }

        return response()->json($data);
    }

        public function indexddd()
    {
        $user = Auth::user();
        $data['user'] = $user;

        if (!$user->is_training_done) {
            return redirect('distributor/training/entrepreneurship_training');
        }

        return view('distributor.training.team_members', $data);
    }

        public function getMemberPlacement()
    {
        $user = Auth::user();
        $data['user'] = $user;
        $data['in_training'] = false;

        if (!$user->is_training_done) {
            $data['in_training'] = true;
        }

         return response()->json($data);
    }
 
  
       public function lead()
    {
        $user = user();
        $data['user'] = $user;
        $data['meetings'] = $this->meetingsRepository->getAllUserMeetings($user->id);
        $data['invited_meetings'] = $this->userMeetingsRepository->getAllUserInvitedMeetings($user->id);
        $data['in_training'] = false;

        $member_commitment = $user->businessGoal;
        $nextBusinessGoal = $user->nextBusinessGoal;
        $sponsored_list = $this->usersServices->getMembers($user->id);

        $data['member_commitment'] = $member_commitment;
        $data['nextBusinessGoal'] = $nextBusinessGoal;
        $data['sponsored_list'] = $sponsored_list;

        if (!$user->is_training_done) {
            $data['in_training'] = true;
        }

        return response()->json($data);
    }

    public function file_upload(Request $request)
    {   
            $user = user();
            $file = $request->file('file');
            $destinationPath = public_path().'/video_invites/';

            $extension = $file->getClientOriginalExtension();
            $videofile= $file->getClientOriginalName();
            $fileName = $videofile.'_'.time().'.'.$extension;

            $file->move($destinationPath,$videofile); 

            return response()->json(['file'=>$videofile]); 

    }


        public function send_invite(Request $request)
        {

        $data = new SendInvites;
        $data->user_id = request('user_id');
        $data->sender_name = request('sender_name');
        $data->type = request('type');
        $data->subject = request('subject');
        $data->phone = request('phone');   
        $data->email = request('email');   
        $data->name = request('name');    
        $data->purl = request('purl');  
        $data->message = request('message');  
        $data->personal_video = request('video_invite');  
        //$data->elite_business_challenge = request('elite_business_challenge');    
        //$data->elite_health_challenge = request('elite_health_challenge');  
        $data->data_1 = request('getVal1');   
        $data->data_2 = request('getVal2');   
        $data->data_3 = request('getVal3');   
        $data->data_4 = request('getVal4');   
        $data->data_5 = request('getVal5');   
        $data->data_6 = request('getVal6');   
        $data->data_7 = request('getVal7');   
        $data->data_8 = request('getVal8');   
        $data->data_9 = request('getVal9');   
        $data->data_10 = request('getVal10');  
        $data->data_11 = request('getVal11');  
        $data->data_12 = request('getVal12');  
        $data->data_13 = request('getVal13');  
        $data->data_14 = request('getVal14');  
        $data->data_15 = request('getVal15');  
        $data->data_16 = request('getVal16');  
        $data->data_17 = request('getVal17');  
        $data->data_18 = request('getVal18');  
        $data->data_19 = request('getVal19');  
        $data->data_20 = request('getVal20');  
        $data->data_21 = request('getVal21');  
        $data->data_22 = request('getVal22');  
        $data->data_23 = request('getVal23');  
        $data->data_24 = request('getVal24');  
        $data->data_25 = request('getVal25');  
        $data->data_26 = request('getVal26');  
        $data->data_27 = request('getVal27');  
        $data->data_28 = request('getVal28');  
        $data->data_29 = request('getVal29');  
        $data->data_30 = request('getVal30');  
        $data->data_31 = request('getVal31');  
        $data->data_32 = request('getVal32');  
        $data->data_33 = request('getVal33');  
        $data->data_34 = request('getVal34');  
        $data->data_35 = request('getVal35');  
        $data->data_36 = request('getVal36');  
        $data->data_37 = request('getVal37');  
        $data->data_38 = request('getVal38');  
        $data->data_39 = request('getVal39');  
        $data->data_40 = request('getVal40');  
        $data->data_41 = request('getVal41');  
        $data->data_42 = request('getVal42');  

        $data->save();


        $dataSendInvitesTitle = new SendInvitesTitle;
        $dataSendInvitesTitle->invite_id = $data->id;
 
        $dataSendInvitesTitle->title_1 = request('displayVal1');   
        $dataSendInvitesTitle->title_2 = request('displayVal2');   
        $dataSendInvitesTitle->title_3 = request('displayVal3');   
        $dataSendInvitesTitle->title_4 = request('displayVal4');   
        $dataSendInvitesTitle->title_5 = request('displayVal5');   
        $dataSendInvitesTitle->title_6 = request('displayVal6');   
        $dataSendInvitesTitle->title_7 = request('displayVal7');   
        $dataSendInvitesTitle->title_8 = request('displayVal8');   
        $dataSendInvitesTitle->title_9 = request('displayVal9');   
        $dataSendInvitesTitle->title_10 = request('displayVal10');  
        $dataSendInvitesTitle->title_11 = request('displayVal11');  
        $dataSendInvitesTitle->title_12 = request('displayVal12');  
        $dataSendInvitesTitle->title_13 = request('displayVal13');  
        $dataSendInvitesTitle->title_14 = request('displayVal14');  
        $dataSendInvitesTitle->title_15 = request('displayVal15');  
        $dataSendInvitesTitle->title_16 = request('displayVal16');  
        $dataSendInvitesTitle->title_17 = request('displayVal17');  
        $dataSendInvitesTitle->title_18 = request('displayVal18');  
        $dataSendInvitesTitle->title_19 = request('displayVal19');  
        $dataSendInvitesTitle->title_20 = request('displayVal20');  
        $dataSendInvitesTitle->title_21 = request('displayVal21');  
        $dataSendInvitesTitle->title_22 = request('displayVal22');  
        $dataSendInvitesTitle->title_23 = request('displayVal23');  
        $dataSendInvitesTitle->title_24 = request('displayVal24');  
        $dataSendInvitesTitle->title_25 = request('displayVal25');  
        $dataSendInvitesTitle->title_26 = request('displayVal26');  
        $dataSendInvitesTitle->title_27 = request('displayVal27');  
        $dataSendInvitesTitle->title_28 = request('displayVal28');  
        $dataSendInvitesTitle->title_29 = request('displayVal29');  
        $dataSendInvitesTitle->title_30 = request('displayVal30');  
        $dataSendInvitesTitle->title_31 = request('displayVal31');  
        $dataSendInvitesTitle->title_32 = request('displayVal32');  
        $dataSendInvitesTitle->title_33 = request('displayVal33');  
        $dataSendInvitesTitle->title_34 = request('displayVal34');  
        $dataSendInvitesTitle->title_35 = request('displayVal35');  
        $dataSendInvitesTitle->title_36 = request('displayVal36');  
        $dataSendInvitesTitle->title_37 = request('displayVal37');  
        $dataSendInvitesTitle->title_38 = request('displayVal38');  
        $dataSendInvitesTitle->title_39 = request('displayVal39');  
        $dataSendInvitesTitle->title_40 = request('displayVal40');  
        $dataSendInvitesTitle->title_41 = request('displayVal41');  
        $dataSendInvitesTitle->title_42 = request('displayVal42');  

        $dataSendInvitesTitle->save();


        $link = "http://dev.legacynetwork.com/shared/".$data->id;

        if($data->type == 'email'){
            Mail::to($data->email)->send(new SendInvitesMail($data->purl,$data->sender_name,$data->name,$data->message,$data->subject,$link));

            $updatestatus = SendInvites::find($data->id);
            $updatestatus->status ='sent';
            $updatestatus->save();

        }else{
            $sid    = "AC0f9f83759ac2456f52d98a607db8ce26";
            $token  = "ff3a20018e9df2f1c125ddc118efdb64";
            $twilio = new Client($sid, $token);

            $message = $twilio->messages
                          ->create("+18018362582", // to
                                   array(
                                       "body" => $data->message." - ".$link,
                                       "from" => "+18018362582",
                                       "statusCallback" => "http://postb.in/1234abcd"
                                   )
                          );

             $updatestatus = SendInvites::find($data->id);
             $updatestatus->status ='sent';
             $updatestatus->save();

        }

         return response([
            'message' => 'Success. Send Invite Data Successfully sent.',
        ], 200);


    }

}
