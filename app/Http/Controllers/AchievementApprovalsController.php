<?php

namespace App\Http\Controllers;

use App\Services\AchievementApprovalsServices;
use Illuminate\Http\Request;

class AchievementApprovalsController extends Controller
{

    /**
     * @var AchievementApprovalsServices
     */
    private $achievementApprovalsServices;

    public function __construct(AchievementApprovalsServices $achievementApprovalsServices)
    {
        $this->achievementApprovalsServices = $achievementApprovalsServices;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->achievementApprovalsServices->create($request->except('_method'));

        return response(['status' => 'ok', 'message' => 'created', 'data' => $data]);
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
        $data = $this->achievementApprovalsServices->update($data = $request->except('_method'), $id);
        return response(['status' => 'ok', 'message' => 'updated', 'data' => $data]);
    }

    public function destroy($id)
    {
        $this->achievementApprovalsServices->delete($id);
        return response(['status' => 'ok', 'message' => 'deleted']);
    }

}
