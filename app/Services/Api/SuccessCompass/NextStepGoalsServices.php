<?php

namespace App\Services\Api\SuccessCompass;

use App\LegacyNetwork\Repositories\Services\Services;
use App\Models\UserHealthGoals;
use App\Repositories\UserNextStepGoalsRepository;
use App\Services\UserNextStepGoalsServices;
use Illuminate\Contracts\Container\Container as App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NextStepGoalsServices extends Services
{
    /**
     * @var App
     */
    private $app;
    /**
     * @var UserNextStepGoalsServices
     */
    private $nextStepGoalsServices;


    /**
     * GoalsServices constructor.
     * @param App $app
     * @param UserNextStepGoalsServices $nextStepGoalsServices
     */
    public function __construct(App $app, UserNextStepGoalsServices $nextStepGoalsServices)
    {
        parent::__construct($app);
        $this->app = $app;
        $this->nextStepGoalsServices = $nextStepGoalsServices;
    }

    function repository()
    {
        return UserNextStepGoalsRepository::class;
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
            $type = $data['type'];
            $goal = $data['goal'];
            $due_date = $data['due_date'];

            $category_id = $this->resolveCategoryId($type);
            $user_id = Auth::user()->id;

            $userGoal = $this->nextStepGoalsServices->findByArray([
                'user_id' => $user_id,
                'category_id' => $category_id,
            ]);

            if ($userGoal) {
                $userGoal = $this->nextStepGoalsServices->update([
                    'user_id' => $user_id,
                    'goal' => $goal,
                    'due_date' => $due_date,
                    'category_id' => $category_id,
                ], $userGoal->id);
            } else {
                $userGoal = $this->nextStepGoalsServices->create([
                    'user_id' => $user_id,
                    'goal' => $goal,
                    'due_date' => $due_date,
                    'category_id' => $category_id,
                ]);
            }

            DB::commit();

            return $userGoal;
        } catch (\Exception $exception) {
            DB::rollback();

            throw $exception;
        }

    }

}