<?php

namespace App\Services;

use App\Repositories\UserHealthActionItemsRepository;
use App\LegacyNetwork\Repositories\Services\Services;

class UserHealthActionItemsServices extends Services
{
    /**
     * @var UserHealthActionItemsRepository $repository
     */
    protected $repository;

    function repository()
    {
        return UserHealthActionItemsRepository::class;
    }
    
}