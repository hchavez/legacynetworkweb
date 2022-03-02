<?php

namespace App\Services;

use App\Repositories\UserGoalResultsRepository;
use App\LegacyNetwork\Repositories\Services\Services;

class UserGoalResultsServices extends Services
{
    /**
     * @var UserGoalResultsRepository $repository
     */
    protected $repository;

    function repository()
    {
        return UserGoalResultsRepository::class;
    }
    
}