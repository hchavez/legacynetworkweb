<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Services\UserEventsServices;
use App\Services\UsersServices;
use Illuminate\Http\Request;

class UserEventsController extends Controller
{

    /**
     * @var UserEventsServices
     */
    private $userEventsServices;

    public function __construct(UserEventsServices $userEventsServices)
    {
        $this->userEventsServices = $userEventsServices;
    }
    public function store(Request $request)
    {
        $data = $request->except('_method');
        $data = $this->userEventsServices->create($data);

        return response(['status' => 'ok', 'message' => 'created', 'data' => $data]);
    }

    public function update(UserRequest $request, $id)
    {
        $data = $this->userEventsServices->update($request->except('_method'), $id);
        return response(['status' => 'ok', 'message' => 'updated', 'data' => $data]);
    }

}
