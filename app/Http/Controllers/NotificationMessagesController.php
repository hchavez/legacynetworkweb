<?php

namespace App\Http\Controllers;

use App\Services\NotificationMessagesServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationMessagesController extends Controller
{
    /**
     * @var NotificationMessagesServices
     */
    private $notificationMessagesServices;


    public function __construct(NotificationMessagesServices $notificationMessagesServices)
    {
        $this->notificationMessagesServices = $notificationMessagesServices;
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
        $data = $this->notificationMessagesServices->create($data);

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
        $data = $this->notificationMessagesServices->update($data = $request->except('_method'), $id);
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
        $this->notificationMessagesServices->delete($id);
        return response(['status' => 'ok', 'message' => 'deleted']);
    }

    public function destroyAll($id)
    {
        $this->notificationMessagesServices->destroyAll($id);
        return response(['status' => 'ok', 'message' => 'All Deleted']);
    }

}
