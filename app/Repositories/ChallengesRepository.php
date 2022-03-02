<?php

namespace App\Repositories;

use App\LegacyNetwork\Repositories\Eloquent\Repository;
use App\Models\Challenges;

class ChallengesRepository extends Repository
{
    function model()
    {
        return Challenges::class;
    }

}