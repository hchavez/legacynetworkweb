<?php

namespace App\Repositories;

use App\LegacyNetwork\Repositories\Eloquent\Repository;
use App\Models\AdvancedAchievements;

class AdvancedAchievementsRepository extends Repository
{
    function model()
    {
        return AdvancedAchievements::class;
    }

    public function achievementLevels()
    {
        return $this->model
            ->with('userPendingApproval')
            ->get();
    }
}