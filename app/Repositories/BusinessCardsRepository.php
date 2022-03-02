<?php

namespace App\Repositories;

use App\LegacyNetwork\Repositories\Eloquent\Repository;
use App\Models\BusinessCards;

class BusinessCardsRepository extends Repository
{
    function model()
    {
        return BusinessCards::class;
    }

}