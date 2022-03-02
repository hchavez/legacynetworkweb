<?php

namespace App\Services;

use App\LegacyNetwork\Repositories\Services\Services;
use App\Repositories\LnFeesRepository;

class LnFeesServices extends Services
{
    function repository()
    {
        return LnFeesRepository::class;
    }

}