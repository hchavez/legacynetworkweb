<?php

namespace App\Services\Api\SuccessCompass;

use App\LegacyNetwork\Repositories\Services\Services;
use App\Models\UserHealthGoals;
use App\Repositories\UserGoalResultsRepository;
use App\Services\UserGoalResultsServices;
use Illuminate\Contracts\Container\Container as App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ResultsServices extends Services
{
    /**
     * @var App
     */
    private $app;
    /**
     * @var UserGoalResultsServices
     */
    private $goalResultsServices;


    /**
     * GoalsServices constructor.
     * @param App $app
     * @param UserGoalResultsServices $goalResultsServices
     */
    public function __construct(App $app, UserGoalResultsServices $goalResultsServices)
    {
        parent::__construct($app);
        $this->app = $app;
        $this->goalResultsServices = $goalResultsServices;
    }

    function repository()
    {
        return UserGoalResultsRepository::class;
    }

    private function resolveCategoryId($type)
    {
        switch ($type) {
            case "health":
                return 1;
            case "business":
                return 2;
            default:
                throw new \Exception('Invalid Goal Type: ' . $type);
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
            $result = $data['result'];

            $category_id = $this->resolveCategoryId($type);
            $user_id = Auth::user()->id;

            $goalResult = $this->goalResultsServices->findByArray([
                'user_id' =>$user_id,
                'category_id' => $category_id,
            ]);

            if ($goalResult) {
                $goalResult = $this->goalResultsServices->update([
                    'user_id' => $user_id,
                    'result' => $result,
                    'category_id' => $category_id,
                ], $goalResult->id);
            } else {
                $goalResult = $this->goalResultsServices->create([
                    'user_id' => $user_id,
                    'result' => $result,
                    'category_id' => $category_id,
                ]);
            }

            DB::commit();
            return $goalResult;

        } catch (\Exception $exception) {
            DB::rollback();

            throw $exception;
        }
    }

}