<?php

namespace App\Http\Controllers;

use Auth;
use App\Services\UserHealthActionsServices;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;

class UserHealthActionsController extends Controller
{
    /**
     * @var UserHealthActionsServices
     */
    private $services;

    public function __construct(UserHealthActionsServices $services)
    {
        $this->services = $services;
    }

    public function getItems(Request $request)
    {
        DB::beginTransaction();
        $retData = [];
        try {

            $userHealthAction = $this->services->findByArray([
                'user_id' => Auth::user()->id,
                'week' => Carbon::parse($request->input('date')),
                'category_id' => $request->input('category_id'),
            ]);

            if ($userHealthAction) {
                $retData['html'] = view('widgets.userHealthActionItems', ['userHealthActionItems' => $userHealthAction->items])->render();
            }


            DB::commit();
        } catch (\Exception $exception) {
            DB::rollback();

            throw $exception;
        }

        return response(['data' => $retData]);
    }
}
