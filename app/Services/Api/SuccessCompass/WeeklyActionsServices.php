<?php

namespace App\Services\Api\SuccessCompass;

use App\LegacyNetwork\Repositories\Services\Services;
use App\Models\UserHealthGoals;
use App\Repositories\UserHealthActionsRepository;
use App\Services\UserHealthActionItemDaysServices;
use App\Services\UserHealthActionItemsServices;
use App\Services\UserHealthActionsServices;
use Carbon\Carbon;
use Illuminate\Contracts\Container\Container as App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WeeklyActionsServices extends Services
{
    /**
     * @var App
     */
    private $app;
    /**
     * @var UserHealthActionsServices
     */
    private $userHealthActionsServices;
    /**
     * @var UserHealthActionItemsServices
     */
    private $userHealthActionItemsServices;
    /**
     * @var UserHealthActionItemDaysServices
     */
    private $userHealthActionItemDaysServices;

    /**
     * WeeklyActionsServices constructor.
     * @param App $app
     * @param UserHealthActionsServices $userHealthActionsServices
     * @param UserHealthActionItemsServices $userHealthActionItemsServices
     * @param UserHealthActionItemDaysServices $userHealthActionItemDaysServices
     */
    public function __construct(
        App $app,
        UserHealthActionsServices $userHealthActionsServices,
        UserHealthActionItemsServices $userHealthActionItemsServices,
        UserHealthActionItemDaysServices $userHealthActionItemDaysServices
    )
    {
        parent::__construct($app);
        $this->app = $app;
        $this->userHealthActionsServices = $userHealthActionsServices;
        $this->userHealthActionItemsServices = $userHealthActionItemsServices;
        $this->userHealthActionItemDaysServices = $userHealthActionItemDaysServices;
    }

    function repository()
    {
        return UserHealthActionsRepository::class;
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
            $week = $data['week'];

            $category_id = $this->resolveCategoryId($type);
            $user_id = Auth::user()->id;

            $userAction = $this->userHealthActionsServices->findByArray([
                'week' => Carbon::parse($week),
                'category_id' => $category_id,
            ]);

            if (!$userAction) {
                $userAction = $this->userHealthActionsServices->create([
                    'user_id' => $user_id,
                    'week' => Carbon::parse($week),
                    'category_id' => $category_id,
                ]);
            }

            if (!empty($data['weekly_items'])) {
                foreach ($data['weekly_items'] as $weekly_item) {
                    $userHealthActionItem = $this->userHealthActionItemsServices->create([
                        'health_action_id' => $userAction->id,
                        'title' => $weekly_item['title'],
                    ]);

                    foreach ($weekly_item['days'] as $day) {
                        $this->userHealthActionItemDaysServices->create([
                            'uhai_id' => $userHealthActionItem->id,
                            'day' => $day,
                        ]);
                    }
                }
            }


            DB::commit();
            return $userAction;

        } catch (\Exception $exception) {
            DB::rollback();

            throw $exception;
        }
    }

}