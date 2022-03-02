<?php

namespace App\Http\Controllers;

use Auth;
use App\Services\UserHealthActionItemDaysServices;
use Illuminate\Http\Request;
use DB;

class UserHealthActionItemDaysController extends Controller
{
    /**
     * @var UserHealthActionItemDaysServices
     */
    private $services;

    public function __construct(UserHealthActionItemDaysServices $services)
    {
        $this->services = $services;
    }

    public function index()
    {
        $data = $this->services->all();

        return response(['status' => 'ok', 'data' => $data]);
    }


    public function toggleItem(Request $request)
    {
        DB::beginTransaction();
        try {
            $day = $this->services->find($request->input('id'));
            $this->services->update([
                'is_complete' => !$day->is_complete,
            ], $request->input('id'));

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollback();

            throw $exception;
        }

        return response(['message' => 'updated']);
    }
}
