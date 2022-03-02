<?php

namespace App\Services;

use App\LegacyNetwork\Repositories\Services\Services;
use App\Repositories\MerchandiseRepository;

class MerchandiseServices extends Services
{
    function repository()
    {
        return MerchandiseRepository::class;
    }

}