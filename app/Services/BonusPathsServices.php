<?php

namespace App\Services;

use App\LegacyNetwork\Repositories\Services\Services;
use App\Repositories\BonusPathsRepository;

class BonusPathsServices extends Services
{
    /** @var  BonusPathsRepository $repository */
    protected $repository;

    function repository()
    {
        return BonusPathsRepository::class;
    }

    public function achievementLevels()
    {
        return $this->repository->achievementLevels();
    }
}