<?php

namespace App\Services;

use App\LegacyNetwork\Repositories\Services\Services;
use App\Repositories\ChallengesRepository;

class ChallengesServices extends Services
{
    function repository()
    {
        return ChallengesRepository::class;
    }

}