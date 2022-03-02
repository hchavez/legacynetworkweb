<?php

namespace App\Services;

use App\LegacyNetwork\Repositories\Services\Services;
use App\Repositories\AdvancedAchievementsRepository;

class AdvancedAchievementsServices extends Services
{
    function repository()
    {
        return AdvancedAchievementsRepository::class;
    }

    public function achievementLevels()
    {
        return $this->repository->achievementLevels();
    }
}