<?php

namespace App\Repositories;

use App\Models\UserHealthGoalCategories;
use App\LegacyNetwork\Repositories\Eloquent\Repository;

class UserHealthGoalCategoriesRepository extends Repository
{
    function model()
    {
        return UserHealthGoalCategories::class;
    }

}