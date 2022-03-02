<?php

namespace App\Services;

use App\LegacyNetwork\Repositories\Services\Services;
use App\Repositories\AutoShipsRepository;

class AutoShipsServices extends Services
{
    function repository()
    {
        return AutoShipsRepository::class;
    }

}