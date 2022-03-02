<?php

namespace App\Http\Controllers;

use App\Services\BroadcastCommentsServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BroadcastCommentsController extends Controller
{
    /**
     * @var BroadcastCommentsServices
     */
    private $broadcastCommentsServices;

    /**
     * BroadcastCommentsController constructor.
     * @param BroadcastCommentsServices $broadcastCommentsServices
     */
    public function __construct(BroadcastCommentsServices $broadcastCommentsServices)
    {
        $this->broadcastCommentsServices = $broadcastCommentsServices;
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
        $user = Auth::user();
        $data['user_id'] = ($user) ? $user->id : null;
        $data = $this->broadcastCommentsServices->create($data);

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
        $data = $this->broadcastCommentsServices->update($data = $request->except('_method'), $id);
        return response(['status' => 'ok', 'message' => 'updated', 'data' => $data]);
    }

    public function polling()
    {
        $data = $this->broadcastCommentsServices->polling();
        return response(['status' => 'ok', 'data' => $data]);
    }

    public function mass_delete(Request $request)
    {
        $data = $this->broadcastCommentsServices->mass_delete($request->all());
        return response(['status' => 'ok', 'data' => $data]);
    }

}
