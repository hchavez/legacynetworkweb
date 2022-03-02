<?php

namespace App\Repositories;

use App\LegacyNetwork\Repositories\Eloquent\Repository;
use App\Models\EventsStatuses;

class EventsStatusesRepository extends Repository
{
    function model()
    {
        return EventsStatuses::class;
    }


}