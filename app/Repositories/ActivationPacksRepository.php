<?php

namespace App\Repositories;

use App\LegacyNetwork\Repositories\Eloquent\Repository;
use App\Models\ActivationPacks;

class ActivationPacksRepository extends Repository
{
    function model()
    {
        return ActivationPacks::class;
    }

}