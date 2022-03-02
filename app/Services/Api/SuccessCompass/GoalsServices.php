<?php

namespace App\Services\Api\SuccessCompass;

use App\LegacyNetwork\Repositories\Services\Services;
use App\Models\UserHealthGoals;
use App\Repositories\UserHealthGoalsRepository;
use App\Services\HealthGoalItemsServices;
use Illuminate\Contracts\Container\Container as App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GoalsServices extends Services
{
    /**
     * @var App
     */
    private $app;
    /**
     * @var HealthGoalItemsServices
     */
    private $goalItemsServices;

    /**
     * GoalsServices constructor.
     * @param App $app
     * @param HealthGoalItemsServices $goalItemsServices
     */
    public function __construct(App $app, HealthGoalItemsServices $goalItemsServices)
    {
        parent::__construct($app);
        $this->app = $app;
        $this->goalItemsServices = $goalItemsServices;
    }

    function repository()
    {
        return UserHealthGoalsRepository::class;
    }

    private function resolveCategoryId($type)
    {
        switch ($type) {
            case "health": return 1;
            case "business": return 2;
            default: throw new \Exception('Invalid Goal Type: ' . $type);
        }
    }

    /**
     * @param array $data
     * @throws \Exception
     * @return UserHealthGoals
     */
    public function create(array $data)
    {
        DB::beginTransaction();

        try {
            /*list("type" => $type, "goal" => $goal, "due_date" => $due_date) = $data;*/
            $type = $data['type'];
            $goal = $data['goal'];
            $due_date = $data['due_date'];

            $category_id = $this->resolveCategoryId($type);
            $user_id = Auth::user()->id;

            $userHealthGoal = $this->repository->findByArray([
                'user_id' => $user_id,
                'category_id' => $category_id,
            ]);

            if ($userHealthGoal) {
                $userHealthGoal = $userHealthGoal = $this->repository->update([
                    'user_id' => $user_id,
                    'goal' => $goal,
                    'due_date' => $due_date,
                    'category_id' => $category_id,
                ], $userHealthGoal->id);
            } else {
                $userHealthGoal = $userHealthGoal = $this->repository->create([
                    'user_id' => $user_id,
                    'goal' => $goal,
                    'due_date' => $due_date,
                    'category_id' => $category_id,
                ]);
            }

            foreach ($userHealthGoal->healthItems as $healthItem) {
                $healthItem->delete();
            }

            if (isset($data['purpose'])) {
                foreach ($data['purpose'] as $canItem) {
                    if ($canItem) {
                        $this->goalItemsServices->create([
                            'health_goal_id' => $userHealthGoal->id,
                            'description' => $canItem
                        ]);
                    }
                }
            }

            DB::commit();

            return UserHealthGoals::where('id', '=', $userHealthGoal->id)->with('healthItems')->first();
        } catch (\Exception $exception) {
            DB::rollback();

            throw $exception;
        }
    }

}