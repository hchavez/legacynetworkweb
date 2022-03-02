<?php

namespace App\Services;

use App\Repositories\UserNextStepGoalsRepository;
use App\LegacyNetwork\Repositories\Services\Services;

class UserNextStepGoalsServices extends Services
{
    /**
     * @var UserNextStepGoalsRepository $repository
     */
    protected $repository;

    function repository()
    {
        return UserNextStepGoalsRepository::class;
    }
    
}