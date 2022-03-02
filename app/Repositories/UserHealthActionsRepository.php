<?php

namespace App\Repositories;

use App\Models\UserHealthActions;
use App\LegacyNetwork\Repositories\Eloquent\Repository;
use Carbon\Carbon;

class UserHealthActionsRepository extends Repository
{
    function model()
    {
        return UserHealthActions::class;
    }

    public function getAllBeforeDate(Carbon $date, $category_id)
    {
        return $this->model
            ->where('week', '<', $date->format('Y-m-d'))
            ->where('category_id', '=', $category_id)
            ->where('user_id', '=', user()->id)
            ->whereNull('user_health_actions.deleted_at')
            ->get();
    }


}