<?php

namespace App\Repositories;

use App\LegacyNetwork\Repositories\Eloquent\Repository;
use App\Models\AchievementApprovals;

class AchievementApprovalsRepository extends Repository
{
    function model()
    {
        return AchievementApprovals::class;
    }

}