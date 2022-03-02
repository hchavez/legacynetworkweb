<?php

namespace App\Services;

use App\LegacyNetwork\Repositories\Services\Services;
use App\Repositories\UserAdvancedAchievementsRepository;

class UserAdvancedAchievementsServices extends Services
{
    function repository()
    {
        return UserAdvancedAchievementsRepository::class;
    }
}