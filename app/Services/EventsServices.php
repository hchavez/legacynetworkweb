<?php

namespace App\Services;

use App\LegacyNetwork\Repositories\Services\Services;
use App\Repositories\EventsRepository;
use Carbon\Carbon;
use Illuminate\Container\Container as App;

class EventsServices extends Services
{
    function repository()
    {
        return EventsRepository::class;
    }

    public function create(array $data)
    {
        if (isset($data['start_date']) && $data['start_date'] != '') {
            $data['start_date'] = Carbon::parse($data['start_date']);
        }

        if (isset($data['end_date']) && $data['end_date'] != '') {
            $data['end_date'] = Carbon::parse($data['end_date']);
        }

        return $this->repository->create($data);
    }

    public function update(array $data, $id)
    {
        if (isset($data['start_date']) && $data['start_date'] != '') {
            $data['start_date'] = Carbon::parse($data['start_date']);
        }

        if (isset($data['end_date']) && $data['end_date'] != '') {
            $data['end_date'] = Carbon::parse($data['end_date']);
        }

        return $this->repository->update($data, $id);
    }

    public function getEventParticipants($event_id)
    {
        return $this->repository->getEventParticipants($event_id);
    }
}