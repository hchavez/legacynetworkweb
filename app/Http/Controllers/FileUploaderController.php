<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Repositories\NotificationMessagesRepository;
use App\Services\UsersServices;

use FFMpeg;
use FFMpeg\Coordinate\Dimension;
use FFMpeg\Format\Video\X264;

 
class FileUploaderController extends Controller
{

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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function fileUpload(Request $request)
    {   
         

            $user = user();
            $file = $request->file('file');
            $destinationPath = public_path().'/video_invites/';

            $extension = $file->getClientOriginalExtension();
            $videofile= $file->getClientOriginalName();
            $fileName = $videofile.'_'.time().'.'.$extension;

            $file->move($destinationPath,$videofile); 

            return response()->json(['file'=>$videofile]); 

         


            //return response()->json(['file'=>$videofile]); 

            /**
            $user = user();
            $file = Request::file('video_invite');
            $extension = $file->getClientOriginalExtension(); 
            $videofile = $file->getClientOriginalName();
            $dir = 'video_invites';
            

            $filename = $user->purl.'_'.$videofile;
            $path = public_path().'/video_invites/';
            $file->move($path, $filename);

            if($extension == "mov"){
                $extension = "mp4"
                $filename1 = $user->purl.'_'.$videofile.'.'.$extension; 
                $file->move($path, $filename1);
            } 

            return response()->json(['file'=>$filename]); **/

    }
 
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function fileUploadPost(Request $request)
    {
        $request->validate([
            'file' => 'required',
        ]);
 
        $fileName = time().'.'.request()->file->getClientOriginalExtension();
 
        request()->file->move(public_path('files'), $fileName);
 
        return response()->json(['success'=>'You have successfully upload file.']);
    }
}