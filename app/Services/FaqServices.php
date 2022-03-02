<?php

namespace App\Services;

use App\LegacyNetwork\Repositories\Services\Services;
use App\Repositories\FaqRepository;

class FaqServices extends Services
{
    function repository()
    {
        return FaqRepository::class;
    }
}
