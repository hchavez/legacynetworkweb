<?php

namespace App\Http\Controllers;

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
use App\Mail\EliteChallengeDay1Email;
use App\Mail\EliteChallengeWelcomeMail;
use App\User;
use Illuminate\Http\Request;
use Mail;

class TeamMembersController extends Controller
{
    public function __construct()
    {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = user();
        $data['user'] = $user;

        if (!$user->is_training_done) {
            return redirect('distributor/training/entrepreneurship_training');
        }

        return view('distributor.training.team_members', $data);
    }

    public function health_challenge_participants()
    {
        $user = user();
        $data['user'] = $user;
        $data['in_training'] = false;

        if (!$user->is_training_done) {
            $data['in_training'] = true;
        }

        return view('distributor.business_building.ehc_members', $data);
    }

    public function resend_health_challenge_emails(Request $request)
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

        return response(['message' => 'sent']);
    }

    public function add_customer(Request $request){

        $getemail = User::where('email',request('email'))->first();     

            if(count($getemail) > 0){
                 return redirect()->back()->with('errors', 'Add New Customer Failed. Email is already exist.');
              exit();

            }else{

                  $data = new User;
                  $data->first_name = request('firstname');
                  $data->last_name = request('lastname');
                  $data->referrer_id = request('referrer_id');
                  $data->email = request('email');
                  $data->mobile = request('phone');
                  $data->password = request('password');
                  $data->is_training_done = request('is_training_done');
                  $data->is_subscribed = request('is_subscribed');
                  $data->created_at = request('created_at');
                  $data->date_challenge =  Carbon::parse(request('created_at'));
                  $data->save();

                  return redirect()->back()->withSuccess('New Customer successfully sent!');
              }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


}
