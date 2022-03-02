<?php

namespace App\Repositories;

use App\LegacyNetwork\Repositories\Eloquent\Repository;
use App\Models\BonusPaths;

class BonusPathsRepository extends Repository
{
    function model()
    {
        return BonusPaths::class;
    }

    public function achievementLevels()
    {
        return $this->model
            ->with([
                'userPendingApproval',
            ])
            ->get();
    }

}