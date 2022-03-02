<?php

namespace App\Repositories;

use App\LegacyNetwork\Repositories\Eloquent\Repository;
use App\Models\AutoShips;

class AutoShipsRepository extends Repository
{
    function model()
    {
        return AutoShips::class;
    }

}