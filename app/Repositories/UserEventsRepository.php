<?php

namespace App\Repositories;

use App\LegacyNetwork\Repositories\Eloquent\Repository;
use App\Models\UserEvents;

class UserEventsRepository extends Repository
{
    function model()
    {
        return UserEvents::class;
    }
}