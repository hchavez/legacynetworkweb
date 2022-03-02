<?php

namespace App\Services;

use App\LegacyNetwork\Repositories\Services\Services;
use App\Repositories\BusinessCardsRepository;

class BusinessCardsServices extends Services
{
    function repository()
    {
        return BusinessCardsRepository::class;
    }

}