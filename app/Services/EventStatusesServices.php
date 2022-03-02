<?php

namespace App\Services;

use App\LegacyNetwork\Repositories\Services\Services;
use App\Repositories\EventsRepository;
use App\Repositories\EventsStatusesRepository;
use Carbon\Carbon;
use Illuminate\Container\Container as App;

class EventStatusesServices extends Services
{
    function repository()
    {
        return EventsStatusesRepository::class;
    }
}