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
use App\Models\EntrepreneurshipTrainingProgress;
use Image;
use Mail;
use Validator;
use DB;

class EntrepreneurshipTrainingProgressController extends Controller
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

          // Update record
      public function updateVideo($id){

         $updateVideo = null;
         $getuserID = EntrepreneurshipTrainingProgress::where('user_id', $id)->get();

         if(!$getuserID){

            $data = new EntrepreneurshipTrainingProgress;
              $data->user_id = $id;
              $data->save();

         }

         $updateVideo = EntrepreneurshipTrainingProgress::where('user_id', $id)->update(request()->all());

         return response()->json($updateVideo);
        //return json_encode(array('statusCode'=>200));
      }


    public function show($id)
    {
         $data = null;
        $data = $this->usersServices->showUserEntTraining($id);

        return response(['status' => 'ok', 'message' => 'updated', 'data' => $data]);
    }

    public function getTraining($id)
    {
         $data = null;
        $data = $this->usersServices->showUserEntTraining($id);
        

        return response(['status' => 'ok', 'message' => 'updated', 'data' => $data]);
    }

    public function update(UserRequest $request, $id)
    {
        $data = $this->usersServices->update($request->except('_method'), $id);
        return response(['status' => 'ok', 'message' => 'updated', 'data' => $data]);
    }

}
