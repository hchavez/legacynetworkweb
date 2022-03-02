<?php

namespace App\Services;

use App\Repositories\UserHealthActionItemDaysRepository;
use App\LegacyNetwork\Repositories\Services\Services;

class UserHealthActionItemDaysServices extends Services
{
    /**
     * @var UserHealthActionItemDaysRepository $repository
     */
    protected $repository;

    function repository()
    {
        return UserHealthActionItemDaysRepository::class;
    }
    
}