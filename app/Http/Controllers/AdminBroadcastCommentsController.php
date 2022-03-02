<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminEnrollmentRequest;
use App\Http\Requests\UserRequest;
use App\Services\BroadcastCommentsServices;
use App\Services\UsersServices;
use Illuminate\Http\Request;

class AdminBroadcastCommentsController extends Controller
{
    /**
     * @var BroadcastCommentsServices
     */
    private $broadcastCommentsServices;

    public function __construct(BroadcastCommentsServices $broadcastCommentsServices)
    {
        $this->broadcastCommentsServices = $broadcastCommentsServices;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('legacy_admin.broadcast_comments');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect('/');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return response(['status' => 'ok', 'message' => 'no need to create data here']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $distributor = $this->broadcastCommentsServices->find($id);
        $distributor->_method = 'PUT';

        $data['data'] = $distributor;

        return view('legacy_admin.synergy_enrollment_form', $data);
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
        $data = $this->broadcastCommentsServices->update($request->except(['_method']), $id);
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
        $data = $this->broadcastCommentsServices->delete($id);
        return response(['status' => 'ok', 'message' => 'deleted', 'data' => $data]);
    }
}
