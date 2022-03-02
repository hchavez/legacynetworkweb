<?php

namespace App\Repositories;

use App\Models\UserHealthActionItems;
use App\LegacyNetwork\Repositories\Eloquent\Repository;

class UserHealthActionItemsRepository extends Repository
{
    function model()
    {
        return UserHealthActionItems::class;
    }

}