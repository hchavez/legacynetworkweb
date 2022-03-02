<?php

namespace App\Http\Controllers;

use Auth;
use App\Http\Controllers\Controller;
use App\Services\UserNextStepGoalsServices;
use Illuminate\Http\Request;
use DB;

class UserNextStepGoalsController extends Controller
{
    /**
     * @var UserNextStepGoalsServices
     */
    private $services;

    public function __construct(UserNextStepGoalsServices $services)
    {
        $this->services = $services;
    }

    public function setUserNextGoal(Request $request)
    {
        DB::beginTransaction();

        try {
            $userGoal = $this->services->findByArray([
                'user_id' => Auth::user()->id,
                'category_id' => $request->input('category_id'),
            ]);

            if ($userGoal) {
                $this->services->update([
                    'user_id' => Auth::user()->id,
                    'goal' => $request->input('goal'),
                    'due_date' => $request->input('due_date'),
                    'category_id' => $request->input('category_id'),
                ], $userGoal->id);
            } else {
                $this->services->create([
                    'user_id' => Auth::user()->id,
                    'goal' => $request->input('goal'),
                    'due_date' => $request->input('due_date'),
                    'category_id' => $request->input('category_id'),
                ]);
            }

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollback();

            throw $exception;
        }

        if ($request->input('category_id') == 1) {
            return redirect('distributor/business_building/success_compass');
        }

        return redirect('distributor/business_building/success_compass_business');
    }
}
