<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePaymentInformationRequest;
use App\Http\Requests\UserRequest;
use App\Http\Traits\UpdatesPayments;
use App\Repositories\NotificationMessagesRepository;
use App\Services\UsersServices;
use App\Repositories\SendInvitesRepository;
use App\Services\SendInvitesServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\SendInvites;
use App\Models\SendInvitesTitle;
use Mail;
use Validator;
use App\Mail\SendInvitesMail;
use Twilio\Rest\Client;

class SendInvitesController extends Controller
{

   
    /**
     * @var UsersServices
     */
    private $usersServices;
    /**
     * @var SendInvitesServices
     */
    private $sendInvitesServices;

    /**
     * @var NotificationMessagesRepository
     */
    private $notificationMessagesRepository;

    public function __construct(UsersServices $usersServices, SendInvitesServices $sendInvitesServices, NotificationMessagesRepository $notificationMessagesRepository)
    {

        $this->usersServices = $usersServices;
        $this->sendInvitesServices = $sendInvitesServices;
        $this->notificationMessagesRepository = $notificationMessagesRepository;
    }


     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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

            //SendInvites::where('id',$data->id)->update(['status'=>'sent']);
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
                                       //"from" => "+15005550006",
                                       "statusCallback" => "http://postb.in/1234abcd"
                                   )
                          );

             $updatestatus = SendInvites::find($data->id);
             $updatestatus->status ='sent';
             $updatestatus->save();

        }

         return back()->with('success', 'Message Invite successfully sent!');

    }

    

    public function text()
    {
        
        // Find your Account Sid and Auth Token at twilio.com/console
        // DANGER! This is insecure. See http://twil.io/secure
        $sid    = "AC0f9f83759ac2456f52d98a607db8ce26";
        $token  = "ff3a20018e9df2f1c125ddc118efdb64";
        $twilio = new Client($sid, $token);

        $message = $twilio->messages
                          ->create("+18013579341", // to receiver
                                   array(
                                       "body" => "Hi Andrew, test text message. Did you got this?..",
                                       "from" => "+18018362582",
                                       //"from" => "+15005550006",
                                       "statusCallback" => "http://postb.in/1234abcd"
                                   )
                          );

        //var_dump($message);

    }

    public function showPurl()
    {
        $user = user();
        $data['user'] = $user;
        $data['in_training'] = false;

        if (!$user->is_training_done) {
            $data['in_training'] = true;
        }

        return view('distributor.settings.my_purl', $data);
    }


    public function index()
    {
        $data = [];
        $data['_method'] = 'POST';
        $data['user_invites'] = $this->sendInvitesServices->getAllSendInvites();
        $data['id'] = null;

        $user = user();
        $data['user'] = $user;

        return view('distributor.send_invites.index', $data);
    }

    
    public function send_invitesto()
    {
        $data = [];
        $data['_method'] = 'POST';
        $data['user_invites'] = $this->sendInvitesServices->getAllSendInvites();
        $data['id'] = null;

        $user = user();
        $data['user'] = $user;

        return view('distributor.send_invites.send_invitesto', $data);
    }


    public function reports()
    {
        $data = [];
        $data['_method'] = 'POST';
        $data['user_invites'] = $this->sendInvitesServices->getAllSendInvites();
        //$data['user_invite_titles'] = $this->sendInvitesServices->getAllSendInvites();
        $data['id'] = null;

        $user = user();
        $data['user'] = $user;

        return view('distributor.send_invites.reports', $data);
    }

    /**
     * Count and increment the no of click that the user click.
     *
     * @param  \App\Models\SendInvites;  $sendInvites
     * @return \Illuminate\Http\Response
     */
    public function count(Request $request)
    {

            $dataTitle = $request->dataTitle;

            $datar = SendInvitesTitle::select($dataTitle)->where('invite_id', $request->share_id)->first();
            
            $update_count=$datar[$dataTitle] + 1;

            SendInvitesTitle::where('invite_id', $request->share_id)->update([$dataTitle => $update_count]);

             //return response()->json(['data'=>$datar]);


    }




    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SendInvites;  $sendInvites
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $data = SendInvites::find($id);

        $data->views = $data->views + 1;

        if($data->views == '1'){

            $user_data = $this->usersServices->showUser($data->user_id);

            $mobile = $user_data["user"]["mobile"];

            $first_name = $user_data["user"]["first_name"];

            $msg = 'Hi '.$first_name.' Your Legacy network invite has been viewed by '.$data->name.'.';

            $sid    = "AC0f9f83759ac2456f52d98a607db8ce26";
            $token  = "ff3a20018e9df2f1c125ddc118efdb64";
            $twilio = new Client($sid, $token);

            $message = $twilio->messages
                          ->create("+18018362582", // to be changed once live from @mobile variable
                                   array(
                                       "body" => $msg,
                                       "from" => "+18018362582",
                                       "statusCallback" => "http://postb.in/1234abcd"
                                   )
                          );

            $data->data_42 = $message;
        }

        $data->save();
    
        return view('public_pages_v2.shared',['data'=>$data]); 
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

        return view('distributor.settings.notifications', $data);
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



 
}
