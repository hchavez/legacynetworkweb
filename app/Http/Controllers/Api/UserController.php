<?php

namespace App\Http\Controllers\Api;

use App\Http\Clients\AuthorizeNet\Client;
use App\Http\Controllers\Controller;
use App\Http\Requests\SetPlacementRequest;
use App\Http\Traits\UpdatesPayments;
use App\Repositories\UsersRepository;
use App\Repositories\MeetingsRepository;
use App\Repositories\UserMeetingsRepository;
use App\Services\UsersServices;
use App\Services\MeetingsServices;
use App\Transformers\TeamMemberTransformer;
use App\Transformers\UserMemberPlacementTransformer;
use App\Transformers\UserProfileTransformer;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\MeetingCreated;
use Mail;

class UserController extends Controller
{
    use UpdatesPayments;
    /**
     * @var UsersServices
     */
    private $usersServices;
    /**
     * @var UsersRepository
     */
    private $userRepository;
        /**
     * @var MeetingsRepository
     */
    private $meetingsRepository;
     /**
     * @var MeetingsServices
     */
    private $meetingsServices;
    /**
     * @var UserMeetingsRepository
     */
    private $userMeetingsRepository;
    /**
     * @var SuccessCompassServices
     */



    /**
     * DistributorController constructor.
     * @param UsersServices $usersServices
     * @param UsersRepository $userRepository
     */
    public function __construct(UsersServices $usersServices, UsersRepository $userRepository,
        MeetingsRepository $meetingsRepository,
        MeetingsServices $meetingsServices,
        UserMeetingsRepository $userMeetingsRepository)
    {
        $this->usersServices = $usersServices;
        $this->userRepository = $userRepository;
         $this->meetingsServices = $meetingsServices;
        $this->meetingsRepository = $meetingsRepository;
        $this->userMeetingsRepository = $userMeetingsRepository;

       $this->middleware('auth:api');
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        $data = fractal()->item($user)->transformWith(new UserProfileTransformer())->toArray();
        return response()->json($data);
    }

    public function updatePersonalDetails(Request $request)
    {
        $user = Auth::user();
        $user = $this->userRepository->update($request->all(), $user->id);

        $data = fractal()->item($user)->transformWith(new UserProfileTransformer())->toArray();
        return response()->json($data);
    }

    public function getMemberPlacement()
    {
        $user = Auth::user();

        $data = fractal()->item($user)->transformWith(new UserMemberPlacementTransformer())->toArray();
        return response()->json($data);
    }

    public function setPlacement(SetPlacementRequest $request)
    {
        $this->usersServices->setPlacement($request->all());
        return response(["message" => 'placement successful']);
    }

    public function cancelSubscription()
    {
        $user = user();
        $cancelResult = $this->usersServices->cancelSubscription();
        if ($cancelResult['status'] == 'successful') {

            $this->usersServices->update([
                'status' => 'INACTIVE'
            ], $user->id);

            return response([
                'message' => $cancelResult['msg']
            ], 200);
        } else {
            return response([
                'message' => $cancelResult['msg']
            ], 500);
        }

    }

    public function getTeamMembers()
    {
        /** @var User $user */
        $user = Auth::user();

        $data = fractal()->collection($user->teamMembers)->transformWith(new TeamMemberTransformer())->toArray();
        return response()->json($data);
    }

    public function getSponsor()
    {
        /** @var User $user */
        $user = Auth::user();

        $data = fractal()->collection($user->sponsor)->transformWith(new TeamMemberTransformer())->toArray();
        return response()->json($data);
    }

 
     public function getCreatedMeetings()
    {
        /** @var User $user */
        $user = Auth::user();

        $data = fractal()->collection($user->createdMeetings)->transformWith(new TeamMemberTransformer())->toArray();
        return response()->json($data);
    }

    public function getInvitedToMeetings()
    {
        /** @var User $user */
        $user = Auth::user();

        $data = fractal()->collection($user->invitedToMeetings)->transformWith(new TeamMemberTransformer())->toArray();
        return response()->json($data);
    }

    public function getAchievementLevel()
    {
        /** @var User $user */
        $user = Auth::user();

        $data = fractal()->collection($user->achievementLevel)->transformWith(new TeamMemberTransformer())->toArray();

        return response()->json($data);
    }

    public function getBonusPath()
    {
        /** @var User $user */
        $user = Auth::user();

        $data = fractal()->collection($user->bonusPath)->transformWith(new TeamMemberTransformer())->toArray();
        return response()->json($data);
    }

    public function getPendingPlacementTeamMembers()
    {
         /** @var User $user */
        $user = Auth::user();

        $data = fractal()->collection($user->pendingPlacementTeamMembers)->transformWith(new TeamMemberTransformer())->toArray();
        return response()->json($data);
    }

    public function getPendingTrainingTeamMembers()
    {
         /** @var User $user */
        $user = Auth::user();

        $data = fractal()->collection($user->pendingTrainingTeamMembers)->transformWith(new TeamMemberTransformer())->toArray();
        return response()->json($data);
    }

    public function getPendingChallengeMembers()
    {
        /** @var User $user */
        $user = Auth::user();

        $data = fractal()->collection($user->pendingChallengeMembers)->transformWith(new TeamMemberTransformer())->toArray();
        return response()->json($data);
    }

    public function getHealthChallengeParticipants()
    {
         /** @var User $user */
        $user = Auth::user();

        $data = fractal()->collection($user->challengeMembers)->transformWith(new TeamMemberTransformer())->toArray();
        return response()->json($data);
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
            'message' => 'Notification Email Sent To Sponsor.',
        ], 200);

    }



        public function getMemberCommitment()
    {
        $user = user();
        $data['user'] = $user;

        $data['member_commitment'] = $user->businessGoal;

        return response()->json($data);
    }


        public function getSponsoredList()
    {
         $user = user();
        $data['user'] = $user;
         $data['in_training'] = false;

        if (!$user->is_training_done) {
            $data['in_training'] = true;
        }


        $data['sponsored_list'] = $this->usersServices->getMembers($user->id);

        return response()->json($data);
    }

        public function getSubscriptionPaymentHistory()
    {
        $user = user();

        $data['user'] = $user;
        $data['in_training'] = false;
        if (!$user->is_training_done) {
            $data['in_training'] = true;
        }

         $authNetClient = new Client();
        if($user->auth_net_subscription_id){
            $data['payment_history'] = $authNetClient->getSubscriptionPaymentHistory($user->auth_net_subscription_id);
        }else{
            $data['message'] = 'User Subscription ID Not Found.';
        }


        return response()->json($data);
    }


        public function showUpdatePaymentInfo()
    {
        $user = user();
        $data['user'] = $user;
        $data['in_training'] = false;
        if (!$user->is_training_done) {
            $data['in_training'] = true;
        }

         return response()->json($data);

    }

        public function showPurlChange()
    {
        $user = user();
        $data['user'] = $user;
        $data['in_training'] = false;

        if (!$user->is_training_done) {
            $data['in_training'] = true;
        }

        return response()->json($data);
    }
    

}
