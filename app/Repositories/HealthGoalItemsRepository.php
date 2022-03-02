<?php

namespace App\Repositories;

use App\Models\HealthGoalItems;
use App\LegacyNetwork\Repositories\Eloquent\Repository;

class HealthGoalItemsRepository extends Repository
{
    function model()
    {
        return HealthGoalItems::class;
    }

}