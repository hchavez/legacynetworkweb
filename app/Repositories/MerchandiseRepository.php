<?php

namespace App\Repositories;

use App\LegacyNetwork\Repositories\Eloquent\Repository;
use App\Models\Merchandise;

class MerchandiseRepository extends Repository
{
    function model()
    {
        return Merchandise::class;
    }

}