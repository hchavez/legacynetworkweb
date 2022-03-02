<?php

namespace App\Services;

use App\LegacyNetwork\Repositories\Services\Services;
use App\Repositories\SuccessCompassRepository;

class SuccessCompassServices extends Services
{
    /** @var  SuccessCompassRepository $repository */
    protected $repository;

    function repository()
    {
        return SuccessCompassRepository::class;
    }

    public function getActiveSuccessCompass($user_id)
    {
        return $this->repository->getActiveSuccessCompass($user_id);
    }

    public function getCompletedSuccessCompass($user_id)
    {
        return $this->repository->getCompletedSuccessCompass($user_id);
    }
}