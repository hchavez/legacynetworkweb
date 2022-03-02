<?php

namespace App\Repositories;

use App\LegacyNetwork\Repositories\Eloquent\Repository;
use App\Models\Products;

class ProductsRepository extends Repository
{
    function model()
    {
        return Products::class;
    }

}