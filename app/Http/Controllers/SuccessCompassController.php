<?php

namespace App\Http\Controllers;

use App\Models\UserHealthActions;
use App\Services\SuccessCompassServices;
use App\Services\UserSuccessCompassServices;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SuccessCompassController extends Controller
{

    /**
     * @var UserSuccessCompassServices
     */
    private $userSuccessCompassServices;
    /**
     * @var SuccessCompassServices
     */
    private $successCompassServices;

    /**
     * SuccessCompassController constructor.
     * @param UserSuccessCompassServices $userSuccessCompassServices
     * @param SuccessCompassServices $successCompassServices
     */
    public function __construct(UserSuccessCompassServices $userSuccessCompassServices, SuccessCompassServices $successCompassServices)
    {
        $this->userSuccessCompassServices = $userSuccessCompassServices;
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
        $data['in_training'] = false;
        $data['userHealthGoal'] = $user->healthGoal;
        $data['userHealthGoalItems'] = $data['userHealthGoal'] ? $data['userHealthGoal']->healthItems : [];
        $data['nextHealthGoal'] = $user->nextHealthGoal;
        $data['goalResults'] = $user->goalResults;
        $data['thisWeekHealthAction'] = ($user->thisWeekHealthAction) ? $user->thisWeekHealthAction : new UserHealthActions();
        if (!$data['thisWeekHealthAction']->week) {
            $data['thisWeekHealthAction']->week = Carbon::now()->startOfWeek()->subDays(1);
        }
        $data['thisWeekHealthActionItems'] = $data['thisWeekHealthAction'] ? $data['thisWeekHealthAction']->items : [];

        if (!$user->is_training_done) {
            $data['in_training'] = true;
        }

        $data['type'] = 'Health';
        $data['type_id'] = 1;
        return view('distributor.business_building.success_compass', $data);
    }

    public function showBusinessCompass()
    {
        $user = user();
        $data['user'] = $user;
        $data['in_training'] = false;
        $data['userHealthGoal'] = $user->businessGoal;
        $data['userHealthGoalItems'] = $data['userHealthGoal'] ? $data['userHealthGoal']->healthItems : [];
        $data['nextHealthGoal'] = $user->nextBusinessGoal;
        $data['goalResults'] = $user->businessGoalResults;
        $data['thisWeekHealthAction'] = ($user->thisWeekBusinessAction) ? $user->thisWeekBusinessAction : new UserHealthActions();
        if (!$data['thisWeekHealthAction']->week) {
            $data['thisWeekHealthAction']->week = Carbon::now()->startOfWeek()->subDays(1);
        }
        $data['thisWeekHealthActionItems'] = $data['thisWeekHealthAction'] ? $data['thisWeekHealthAction']->items : [];

        if (!$user->is_training_done) {
            $data['in_training'] = true;
        }

        $data['type'] = 'Business';
        $data['type_id'] = 2;
        return view('distributor.business_building.success_compass', $data);
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
        $data = $request->except('_method');
        $data = $this->userSuccessCompassServices->create($data);

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
        $data = $this->userSuccessCompassServices->update($data = $request->except('_method'), $id);
        return response(['status' => 'ok', 'message' => 'created', 'data' => $data]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del = $this->userSuccessCompassServices->delete($id);
        if ($del) return response(['status' => 'ok', 'message' => 'deleted']);

        return response(['status' => 'failed', 'message' => 'error']);
    }

    public function changeStatus(Request $request)
    {
        $data = $this->userSuccessCompassServices->changeStatus($request->all());
        return response(['status' => 'ok', 'message' => 'updated', 'data' => $data]);
    }

}
