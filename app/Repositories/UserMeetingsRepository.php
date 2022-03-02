<?php

namespace App\Repositories;

use App\LegacyNetwork\Repositories\Eloquent\Repository;
use App\Models\UserMeetings;
use DB;

class UserMeetingsRepository extends Repository
{
    function model()
    {
        return UserMeetings::class;
    }

    public function getAllUserInvitedMeetings($id)
    {
        return $this->model
            ->with('meeting')
            ->where('user_id', $id)
            ->get();
    }

    public function getMeetingCommitmentsByMeetingId($meeting_id)
    {
        return $this->model
            ->select([
                'user_success_compass.*',
                'success_compass.fa_icon',
                DB::raw('CONCAT(users.first_name, " ", users.last_name) as user_full_name')
            ])
            ->join('user_success_compass', function($join) {
                $join->on('user_success_compass.user_id', '=', 'user_meetings.user_id')
                    ->where('user_success_compass.success_compass_id', '=', 1)
                    ->where('user_success_compass.is_complete', '=', 0)
                    ->whereNull('user_success_compass.deleted_at')
                ;
            })
            ->join('success_compass', function($join) {
                $join->on('success_compass.id', '=', 'user_success_compass.success_compass_id');
            })
            ->join('users', function($join) {
                $join->on('user_meetings.user_id', '=', 'users.id');
            })
            ->where('user_meetings.meeting_id', $meeting_id)
            ->get();
    }

    public function getAttendingMembersAndTheirCommitments($meeting_id)
    {
        return $this->model
            ->select([
                'users.id',
                'users.first_name',
                'users.last_name',
                'completed.label as completed_label',
                DB::raw('DATE_FORMAT(completed.complete_date, "%m/%d/%Y") as completed_date'),
                'incomplete.label as incomplete_label',
                DB::raw('DATE_FORMAT(incomplete.date, "%m/%d/%Y") as incomplete_due_date')
            ])
            ->join('users', function($join) {
                $join->on('user_meetings.user_id', '=', 'users.id');
            })
            ->leftJoin('user_success_compass as completed', function($join) {
                $join->on('completed.user_id', '=', 'users.id')
                    ->where('completed.success_compass_id', '=', 1)
                    ->where('completed.is_complete', '=', 1)
                    ->whereNull('completed.deleted_at')
                ;
            })
            ->leftJoin('user_success_compass as incomplete', function($join) {
                $join->on('incomplete.user_id', '=', 'users.id')
                    ->where('incomplete.success_compass_id', '=', 1)
                    ->where('incomplete.is_complete', '=', 0)
                    ->whereNull('incomplete.deleted_at')
                ;
            })
            ->where('user_meetings.meeting_id', $meeting_id)
            ->get();
    }

}