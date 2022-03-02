<?php

namespace App\Repositories;

use App\LegacyNetwork\Repositories\Eloquent\Repository;
use App\Models\Orders;

class OrdersRepository extends Repository
{
    function model()
    {
        return Orders::class;
    }

}