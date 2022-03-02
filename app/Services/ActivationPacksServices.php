<?php

namespace App\Services;

use App\LegacyNetwork\Repositories\Services\Services;
use App\Repositories\ActivationPacksRepository;

class ActivationPacksServices extends Services
{
    function repository()
    {
        return ActivationPacksRepository::class;
    }

}