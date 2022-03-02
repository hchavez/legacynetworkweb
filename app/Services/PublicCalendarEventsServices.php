<?php

namespace App\Services;

use App\LegacyNetwork\Repositories\Services\Services;
use App\Repositories\PublicCalendarEventsRepository;
use Carbon\Carbon;

class PublicCalendarEventsServices extends Services
{
    /** @var PublicCalendarEventsRepository $repository  */
    protected  $repository;

    function repository()
    {
        return PublicCalendarEventsRepository::class;
    }

    public function getPublicCalendarEventsByTypeId($type_id, $start, $end)
    {
        return $this->repository->getPublicCalendarEventsByTypeId($type_id, $start, $end);
    }

    public function create(array $data)
    {
        if (isset($data['start_time'])) {
            $data['start_date'] = Carbon::parse($data['start_date'] . ' ' . $data['start_time']);
            unset($data['start_time']);
        }

        if (isset($data['end_time'])) {
            $data['end_date'] = Carbon::parse($data['end_date'] . ' ' . $data['end_time']);
            unset($data['end_time']);
        }

        return $this->repository->create($data);
    }

    public function update(array $data, $id)
    {
        if (isset($data['start_time'])) {
            $data['start_date'] = Carbon::parse($data['start_date'] . ' ' . $data['start_time']);
            unset($data['start_time']);
        }

        if (isset($data['end_time'])) {
            $data['end_date'] = Carbon::parse($data['end_date'] . ' ' . $data['end_time']);
            unset($data['end_time']);
        }

        return $this->repository->update($data, $id);
    }
}