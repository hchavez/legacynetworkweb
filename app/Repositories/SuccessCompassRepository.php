<?php

namespace App\Repositories;

use App\LegacyNetwork\Repositories\Eloquent\Repository;
use App\Models\SuccessCompass;
use Illuminate\Support\Facades\DB;

class SuccessCompassRepository extends Repository
{
    function model()
    {
        return SuccessCompass::class;
    }

    public function getActiveSuccessCompass($user_id)
    {
        return $this->model
            ->select([
                'success_compass.category_name',
                'success_compass.title',
                'success_compass.fa_icon',
                'success_compass.id as success_compass_id',
                'success_compass.default_label',
                'user_success_compass.id',
                'user_success_compass.user_id',
                'user_success_compass.label',
                'user_success_compass.note',
                DB::raw("DATE_FORMAT(user_success_compass.date, '%m/%d/%Y %h:%i %p') as date"),
                DB::raw('IF(user_success_compass.date < CURRENT_DATE(), true, false) as is_due'),
                'user_success_compass.is_complete',
            ])
            ->leftJoin('user_success_compass', function($join) use($user_id) {
                $join->on('user_success_compass.success_compass_id', '=', 'success_compass.id')
                    ->where('user_success_compass.is_complete', '!=', 1)
                    ->where('user_success_compass.user_id', '=', $user_id)
                    ->whereNull('user_success_compass.deleted_at')
                ;
            })
            ->get();
    }

    public function getCompletedSuccessCompass($user_id)
    {
        return $this->model
            ->select([
                'success_compass.category_name',
                'success_compass.title',
                'success_compass.fa_icon',
                'success_compass.id as success_compass_id',
                'success_compass.default_label',
                'user_success_compass.id',
                'user_success_compass.user_id',
                'user_success_compass.label',
                'user_success_compass.note',
                DB::raw("DATE_FORMAT(user_success_compass.complete_date, '%m/%d/%Y %h:%i %p') as date"),
                'user_success_compass.is_complete',
            ])
            ->leftJoin('user_success_compass', function($join) use($user_id) {
                $join->on('user_success_compass.success_compass_id', '=', 'success_compass.id')
                    ->where('user_success_compass.is_complete', '=', 1)
                    ->where('user_success_compass.user_id', '=', $user_id)
                    ->whereNull('user_success_compass.deleted_at')
                ;
            })
            ->get();
    }

}