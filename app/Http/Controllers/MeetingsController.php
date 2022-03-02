<?php

namespace App\Http\Controllers;

use App\Repositories\MeetingsRepository;
use App\Repositories\UserMeetingsRepository;
use App\Repositories\UserSuccessCompassRepository;
use App\Services\MeetingsServices;
use App\Services\SuccessCompassServices;
use App\Services\UsersServices;
use Illuminate\Http\Request;

class MeetingsController extends Controller
{

    /**
     * @var MeetingsServices
     */
    private $meetingsServices;
    /**
     * @var UsersServices
     */
    private $usersServices;
    /**
     * @var MeetingsRepository
     */
    private $meetingsRepository;
    /**
     * @var UserMeetingsRepository
     */
    private $userMeetingsRepository;
    /**
     * @var SuccessCompassServices
     */
    private $successCompassServices;

    /**
     * @param MeetingsServices $meetingsServices
     * @param MeetingsRepository $meetingsRepository
     * @param UserMeetingsRepository $userMeetingsRepository
     * @param UsersServices $usersServices
     */
    public function __construct(
        MeetingsServices $meetingsServices,
        MeetingsRepository $meetingsRepository,
        UserMeetingsRepository $userMeetingsRepository,
        UsersServices $usersServices,
        SuccessCompassServices $successCompassServices
    )
    {
        $this->meetingsServices = $meetingsServices;
        $this->usersServices = $usersServices;
        $this->meetingsRepository = $meetingsRepository;
        $this->userMeetingsRepository = $userMeetingsRepository;
        $this->successCompassServices = $successCompassServices;
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

        return view('distributor.team_meetings.lead', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = user();
        $data['user'] = $user;
        $data['members'] = $this->usersServices->getMembers($user->id);
        $data['in_training'] = false;

        if (!$user->is_training_done) {
            $data['in_training'] = true;
        }

        return view('distributor.team_meetings.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except('_method');
        $data = $this->meetingsServices->create($data);

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
        $meeting = $this->meetingsServices->find($id);
        $user = $meeting->user;
        $data['meeting'] = $meeting;
        $data['user'] = $user;
        $data['attendingMembersAndTheirCommitments'] = $this->userMeetingsRepository->getAttendingMembersAndTheirCommitments($meeting->id);

        return view('distributor.team_meetings.show', $data);
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
        $data = $this->meetingsServices->update($data = $request->except('_method'), $id);
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
        $this->meetingsServices->delete($id);

        return response(['message' => 'deleted']);
    }

    public function certification_meeting_outline()
    {
        $user = user();
        $data['user'] = $user;
        $data['in_training'] = false;

        if (!$user->is_training_done) {
            $data['in_training'] = true;
        }

        return view('distributor.team_meetings.certification_outline', $data);
    }

}
