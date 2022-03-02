<?php

namespace App\Repositories;

use App\LegacyNetwork\Repositories\Eloquent\Repository;
use App\Models\Events;
use DB;

class EventsRepository extends Repository
{
    function model()
    {
        return Events::class;
    }

    public function getEventsByTitle($name_id)
    {
        $eventMap = [
            '1' => 'Financial Summit',
            '2' => 'Leadership Summit',
            '3' => 'Legacy Summit'
        ];

        $user = user();

        $now = carbonNow();

        return $this->model
            ->select([
                'events.id',
                'events.name',
                'events.start_date',
                'events.end_date',
                'events.start_time',
                'events.end_time',
                'events.max_participants',
                'event_statuses.name as status'
            ])
            ->leftJoin('user_events', function ($join) use ($user) {
                $join->on('user_events.event_id', '=', 'events.id')
                    ->where('user_events.user_id', '=', $user->id);
            })
            ->leftJoin('event_statuses', function ($join) {
                $join->on('event_statuses.id', '=', 'user_events.status_id');
            })
            ->where('events.name', '=', $eventMap[$name_id])
            ->where('events.start_date', '>=', $now)
            ->whereNull('events.deleted_at')
            ->get();
    }

    public function getEventParticipants($event_id)
    {
        return $this->model
            ->select([
                'users.id as user_id',
                'events.id as event_id',
                'user_events.id as user_event_id',
                DB::raw('CONCAT(users.first_name, " ", IFNULL(users.middle_name, ""), " ", users.last_name) as full_name'),
                'event_statuses.description as status',
                'event_statuses.id as status_id'
            ])
            ->join('user_events', 'user_events.event_id', 'events.id')
            ->join('users', 'users.id', 'user_events.user_id')
            ->join('event_statuses', 'event_statuses.id', 'user_events.status_id')
            ->where('events.id', '=', $event_id)
            ->get();
    }

}