<?php

namespace App\Services;

use App\LegacyNetwork\Repositories\Services\Services;
use App\Repositories\AchievementLevelsRepository;

class AchievementLevelsServices extends Services
{
    /** @var  AchievementLevelsRepository $repository */
    protected $repository;

    function repository()
    {
        return AchievementLevelsRepository::class;
    }

    public function achievementLevels()
    {
        return $this->repository->achievementLevels();
    }
}