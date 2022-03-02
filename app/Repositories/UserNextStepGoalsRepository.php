<?php

namespace App\Repositories;

use App\Models\UserNextStepGoals;
use App\LegacyNetwork\Repositories\Eloquent\Repository;

class UserNextStepGoalsRepository extends Repository
{
    function model()
    {
        return UserNextStepGoals::class;
    }

}