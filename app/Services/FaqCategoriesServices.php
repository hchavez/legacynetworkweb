<?php

namespace App\Services;

use App\LegacyNetwork\Repositories\Services\Services;
use App\Repositories\FaqCategoriesRepository;

class FaqCategoriesServices extends Services
{
    function repository()
    {
        return FaqCategoriesRepository::class;
    }

}
