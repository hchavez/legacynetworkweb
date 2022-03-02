<?php

namespace App\Repositories;

use App\LegacyNetwork\Repositories\Eloquent\Repository;
use App\Models\AchievementLevels;

class AchievementLevelsRepository extends Repository
{
    function model()
    {
        return AchievementLevels::class;
    }

    public function achievementLevels()
    {
        return $this->model
            ->with([
                'userPendingApproval',
                'group'
            ])
            ->get();
    }

}