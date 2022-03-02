<?php

namespace App\Repositories;

use App\LegacyNetwork\Repositories\Eloquent\Repository;
use App\Models\UserSuccessCompass;
use DB;

class UserSuccessCompassRepository extends Repository
{
    function model()
    {
        return UserSuccessCompass::class;
    }

    public function getUserSuccessCompassList($user)
    {
        return $this->model->select([
            'user_success_compass.id',
            'user_success_compass.label',
            'user_success_compass.date',
            'success_compass.category_name',
            'success_compass.title'
        ])
            ->join('success_compass', function ($join) {
                $join->on('success_compass.id', '=', 'user_success_compass.success_compass_id');
            })
            ->where('user_success_compass.user_id', '=', $user->id)
            ->get();
    }

    public function deletePreviousCompleteRecords($user_id, $success_compass_id, $self_id)
    {
        $this->model
            ->where('user_id', '=', $user_id)
            ->where('success_compass_id', '=', $success_compass_id)
            ->where('id', '!=', $self_id)
            ->whereNull('deleted_at')
            ->delete();
    }
}