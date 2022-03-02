<?php

namespace App\Services;

use App\Repositories\UserHealthActionsRepository;
use App\LegacyNetwork\Repositories\Services\Services;

class UserHealthActionsServices extends Services
{
    /**
     * @var UserHealthActionsRepository $repository
     */
    protected $repository;

    function repository()
    {
        return UserHealthActionsRepository::class;
    }
    
}