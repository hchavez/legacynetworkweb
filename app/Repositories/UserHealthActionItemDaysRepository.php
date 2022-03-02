<?php

namespace App\Repositories;

use App\Models\UserHealthActionItemDays;
use App\LegacyNetwork\Repositories\Eloquent\Repository;

class UserHealthActionItemDaysRepository extends Repository
{
    function model()
    {
        return UserHealthActionItemDays::class;
    }

}