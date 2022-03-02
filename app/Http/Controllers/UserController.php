<?php

namespace App\Http\Controllers;

use App\Http\Clients\AuthorizeNet\Client;
use App\Http\Requests\UpdatePaymentInformationRequest;
use App\Http\Requests\UserRequest;
use App\Http\Traits\UpdatesPayments;
use App\Mail\MeetingCreated;
use App\Repositories\NotificationMessagesRepository;
use App\Services\UsersServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;
use Mail;
use Validator;
use DB;

class UserController extends Controller
{

    use UpdatesPayments;
    /**
     * @var UsersServices
     */
    private $usersServices;
    /**
     * @var NotificationMessagesRepository
     */
    private $notificationMessagesRepository;

    public function __construct(UsersServices $usersServices, NotificationMessagesRepository $notificationMessagesRepository)
    {

        $this->usersServices = $usersServices;
        $this->notificationMessagesRepository = $notificationMessagesRepository;
    }

    public function show($id)
    {
        $data = null;
        $data = $this->usersServices->showUser($id);
        return response(['status' => 'ok', 'message' => 'updated', 'data' => $data]);
    }

    public function update(UserRequest $request, $id)
    {
        $data = $this->usersServices->update($request->except('_method'), $id);
        return response(['status' => 'ok', 'message' => 'updated', 'data' => $data]);
    }

    public function showEntTraining($id)
    {
        $data = null;
        $data = $this->usersServices->showUserEntTraining($id);
        return response(['status' => 'ok', 'message' => 'updated', 'data' => $data]);
    }


    public function showPurlChange()
    {
        $user = user();
        $data['user'] = $user;
        $data['in_training'] = false;

        if (!$user->is_training_done) {
            $data['in_training'] = true;
        }

        return view('distributor.settings.my_purl', $data);
    }

    public function showPasswordChange()
    {
        $user = user();
        $data['user'] = $user;
        $data['in_training'] = false;

        if (!$user->is_training_done) {
            $data['in_training'] = true;
        }

        return view('distributor.settings.change_password', $data);
    }

    public function showPersonalDetails()
    {
        $user = user();
        $data['user'] = $user;
        $data['in_training'] = false;

        if (!$user->is_training_done) {
            $data['in_training'] = true;
        }

        return view('distributor.settings.personal_details', $data);
    }

    public function showUserPreview()
    {
        $user = user();
        $data['user'] = $user;
        $data['in_training'] = false;

        if (!$user->is_training_done) {
            $data['in_training'] = true;
        }

        return view('distributor.settings.preview', $data);
    }

    public function showUserNotifications()
    {
        $user = user();
        $data['user'] = $user;
        $data['in_training'] = false;
        $data['deleted_messages'] = $this->notificationMessagesRepository->getAllDeletedByUserId(Auth::user()->id);
        if (!$user->is_training_done) {
            $data['in_training'] = true;
        }

          //$data = DB::table("notification_messages")->where('user_id', Auth::user()->id)->get();

        //return view('products',compact('products'));

        return view('distributor.settings.notifications', $data);

    }

        public function deleteUserNotifications($id)
    {
        DB::table("notification_messages")->delete($id);
        return response()->json(['success'=>"Notification Message Deleted successfully.", 'tr'=>'tr_'.$id]);
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function deleteAllUserNotifications(Request $request)
    {
        $ids = $request->ids;
        DB::table("notification_messages")->whereIn('id',explode(",",$ids))->delete();
        return response()->json(['success'=>"Notification Messages Deleted successfully."]);
    }

    public function deleteAllUserInvite(Request $request)
    {
        $ids = $request->ids;
        DB::table("send_invites")->whereIn('id',explode(",",$ids))->delete();
        return response()->json(['success'=>"Share Tool Invite Deleted successfully."]);
    }


    public function NotificationMassDelete(Request $request)
    {
        $data = $this->broadcastCommentsServices->mass_delete($request->all());
        return response(['status' => 'ok', 'data' => $data]);
    }


    public function showSubscription()
    {
        $user = user();
        $data['user'] = $user;
        $data['in_training'] = false;
        $data['deleted_messages'] = $this->notificationMessagesRepository->getAllDeletedByUserId(Auth::user()->id);
        if (!$user->is_training_done) {
            $data['in_training'] = true;
        }

        return view('distributor.settings.subscriptions', $data);
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

    public function update_avatar(Request $request)
    {

        // Handle the user upload of avatar
        if ($request->hasFile('file')) {
            $avatar = $request->file('file');
            $filename = time() . '.' . 'png';
            Image::make($avatar)->fit(300, 300)->save(public_path('/uploads/avatars/' . $filename));

            $user = user();
            $user->avatar = $filename;
            $user->save();
        }

        return redirect()->back();

    }

    public function payment_declined($id)
    {
        return $this->usersServices->paymentDeclined($id);
    }

    public function ehc_payment_declined($id)
    {
        return $this->usersServices->paymentDeclinedEhc($id);
    }

    public function member_pdf($id)
    {
        return $this->usersServices->memberPdf($id);
    }

    public function elite_challenge_pdf($id)
    {
        return $this->usersServices->eliteChallengePDF($id);
    }

    public function member_direct_deposit_form(Request $request)
    {
        return $this->usersServices->member_direct_deposit_form($request->all());
    }

    public function notify_sponsor_for_certification()
    {
        $user = Auth::user();
        $sponsor = $user->sponsor;
        Mail::to($sponsor->email)->send(new MeetingCreated($user));
    }

    public function showUpdatePaymentInfo()
    {
        $user = user();
        $data['user'] = $user;
        $data['in_training'] = false;
        if (!$user->is_training_done) {
            $data['in_training'] = true;
        }

        return view('distributor.settings.update_payment_info', $data);
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
        $data['payment_history'] = $authNetClient->getSubscriptionPaymentHistory($user->auth_net_subscription_id);
        return view('distributor.settings.payment_history', $data);

    }

    public function checkPurl(Request $request)
    {
        $url = url('/login');
        $request->validate([
            'purl' => 'required|exists:users,purl|active_purl',
        ], [
            'purl.required' => "Oops! It looks like this website is temporarily inactive. <br>Visitors: Please contact the person that invited you here. <br>Website Owner: Please login to your dashboard here to quickly resolve this issue. <a href='$url'>Click here to login</a> ",
            'purl.exists' => "Oops! It looks like this website is temporarily inactive. <br>Visitors: Please contact the person that invited you here. <br>Website Owner: Please login to your dashboard here to quickly resolve this issue. <a href='$url'>Click here to login</a> ",
            'purl.active_purl' => "Oops! It looks like this website is temporarily inactive. <br>Visitors: Please contact the person that invited you here. <br>Website Owner: Please login to your dashboard here to quickly resolve this issue. <a href='$url'>Click here to login</a> ",
        ]);

        return response(['message' => 'found']);
    }
}
