<?php

namespace App\Services;

use App\Repositories\UserHealthGoalsRepository;
use App\LegacyNetwork\Repositories\Services\Services;

class UserHealthGoalsServices extends Services
{
    /**
     * @var UserHealthGoalsRepository $repository
     */
    protected $repository;

    function repository()
    {
        return UserHealthGoalsRepository::class;
    }
    
}