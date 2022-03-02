<?php

namespace App\Repositories;

use App\LegacyNetwork\Repositories\Eloquent\Repository;
use App\Models\PublicCalendarEvents;
use Illuminate\Support\Carbon;

class PublicCalendarEventsRepository extends Repository
{
    function model()
    {
        return PublicCalendarEvents::class;
    }

    public function getPublicCalendarEventsByTypeId($type_id, $start, $end)
    {
        return $this->model
            ->select([
                'id',
                'title',
                'type',
                'start_date as start',
                'end_date as end',
                'details',
            ])
            ->where('start_date', '>=', Carbon::parse($start))
            ->where('end_date', '<=', Carbon::parse($end))
            ->where('type', '=', $type_id)
            ->whereNull('deleted_at')
            ->get();
    }
}