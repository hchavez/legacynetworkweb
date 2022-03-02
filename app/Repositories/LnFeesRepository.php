<?php

namespace App\Repositories;

use App\LegacyNetwork\Repositories\Eloquent\Repository;
use App\Models\AutoShips;
use App\Models\LnFees;

class LnFeesRepository extends Repository
{
    function model()
    {
        return LnFees::class;
    }

}