<?php

namespace App\Services\Api\SuccessCompass;

use App\LegacyNetwork\Repositories\Services\Services;
use App\Repositories\UserHealthActionItemsRepository;
use App\Services\UserHealthActionItemDaysServices;
use App\Services\UserHealthActionItemsServices;
use App\Services\UserHealthActionsServices;
use Illuminate\Contracts\Container\Container as App;

class WeeklyActionItemsServices extends Services
{
    /**
     * @var App
     */
    private $app;
    /**
     *
     * /**
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
        UserHealthActionItemsServices $userHealthActionItemsServices,
        UserHealthActionItemDaysServices $userHealthActionItemDaysServices
    )
    {
        parent::__construct($app);
        $this->app = $app;
        $this->userHealthActionItemsServices = $userHealthActionItemsServices;
        $this->userHealthActionItemDaysServices = $userHealthActionItemDaysServices;
    }

    function repository()
    {
        return UserHealthActionItemsRepository::class;
    }


}