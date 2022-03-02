<?php

namespace App\Services;

use App\LegacyNetwork\Repositories\Services\Services;
use App\Repositories\ProductsRepository;

class ProductsServices extends Services
{
    function repository()
    {
        return ProductsRepository::class;
    }

}