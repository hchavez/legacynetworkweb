<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\HealthGoalItemsServices;
use App\Services\UserHealthGoalsServices;
use Auth;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Log;

class UserHealthGoalsController extends Controller
{
    /**
     * @var UserHealthGoalsServices
     */
    private $services;
    /**
     * @var HealthGoalItemsServices
     */
    private $goalItemsServices;

    /**
     * UserHealthGoalsController constructor.
     * @param UserHealthGoalsServices $services
     * @param HealthGoalItemsServices $goalItemsServices
     */
    public function __construct(
        UserHealthGoalsServices $services,
        HealthGoalItemsServices $goalItemsServices
    )
    {
        $this->services = $services;
        $this->goalItemsServices = $goalItemsServices;
    }

    public function setUserHealthGoal(Request $request)
    {
        DB::beginTransaction();

        try {
            $userHealthGoal = $this->services->findByArray([
                'user_id' => Auth::user()->id,
                'category_id' => $request->input('category_id'),
            ]);

            if ($userHealthGoal) {
                $userHealthGoal = $this->services->update([
                    'user_id' => Auth::user()->id,
                    'goal' => $request->input('goal'),
                    'due_date' => $request->input('due_date'),
                    'category_id' => $request->input('category_id'),
                ], $userHealthGoal->id);
            } else {
                $userHealthGoal = $this->services->create([
                    'user_id' => Auth::user()->id,
                    'goal' => $request->input('goal'),
                    'due_date' => $request->input('due_date'),
                    'category_id' => $request->input('category_id'),
                ]);
            }

            foreach ($userHealthGoal->healthItems as $healthItem) {
                $healthItem->delete();
            }

            foreach ($request->input('can_list') as $canItem) {
                if ($canItem) {
                    $this->goalItemsServices->create([
                        'health_goal_id' => $userHealthGoal->id,
                        'description' => $canItem
                    ]);
                }
            }

            $this->services->update([
                'due_date' => $request->input('due_date'),
            ], $userHealthGoal->id);

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
