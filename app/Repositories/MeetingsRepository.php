<?php

namespace App\Repositories;

use App\LegacyNetwork\Repositories\Eloquent\Repository;
use App\Models\Meetings;

class MeetingsRepository extends Repository
{
    function model()
    {
        return Meetings::class;
    }

    public function getAllUserMeetings($id, $is_entrepreneurship_meeting = false)
    {
        return $this->model->where('user_id', '=', $id)
            ->where('is_entrepreneurship_meeting', '=', $is_entrepreneurship_meeting)
            ->get();
    }
}