<?php

namespace App\Repositories;

use App\Models\UserHealthGoals;
use App\LegacyNetwork\Repositories\Eloquent\Repository;

class UserHealthGoalsRepository extends Repository
{
    function model()
    {
        return UserHealthGoals::class;
    }

}