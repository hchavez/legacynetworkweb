<?php

namespace App\Repositories;

use App\Models\UserGoalResults;
use App\LegacyNetwork\Repositories\Eloquent\Repository;

class UserGoalResultsRepository extends Repository
{
    function model()
    {
        return UserGoalResults::class;
    }

}