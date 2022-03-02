<?php

namespace App\Repositories;

use App\LegacyNetwork\Repositories\Eloquent\Repository;
use App\Models\UserAdvancedAchievements;

class UserAdvancedAchievementsRepository extends Repository
{
    function model()
    {
        return UserAdvancedAchievements::class;
    }

}