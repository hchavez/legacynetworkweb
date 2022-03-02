<?php

namespace App\Services;

use App\Repositories\HealthGoalItemsRepository;
use App\LegacyNetwork\Repositories\Services\Services;

class HealthGoalItemsServices extends Services
{
    /**
     * @var HealthGoalItemsRepository $repository
     */
    protected $repository;

    function repository()
    {
        return HealthGoalItemsRepository::class;
    }
    
}