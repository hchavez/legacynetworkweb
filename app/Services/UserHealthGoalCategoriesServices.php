<?php

namespace App\Services;

use App\Repositories\UserHealthGoalCategoriesRepository;
use App\LegacyNetwork\Repositories\Services\Services;

class UserHealthGoalCategoriesServices extends Services
{
    /**
     * @var UserHealthGoalCategoriesRepository $repository
     */
    protected $repository;

    function repository()
    {
        return UserHealthGoalCategoriesRepository::class;
    }
    
}