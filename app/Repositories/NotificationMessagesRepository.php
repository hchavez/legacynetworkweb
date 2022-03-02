<?php

namespace App\Repositories;

use App\LegacyNetwork\Repositories\Eloquent\Repository;
use App\Models\NotificationMessages;

class NotificationMessagesRepository extends Repository
{
    function model()
    {
        return NotificationMessages::class;
    }

    public function getAllDeletedByUserId($userId)
    {
        return $this->model->withTrashed()
            ->where('user_id', '=', $userId)
            ->whereNotNull('deleted_at')
            ->orderBy('id', 'DESC')
            ->get();

    }

        public function getNotificationByUserId($userId)
    {
        return $this->model->withTrashed()
            ->where('user_id', '=', $userId)
            ->orderBy('id', 'DESC')
            ->get();

    }

        public function mass_delete(array $data)
    {
        return $this->model
            ->whereIn('id', $data['ids'])
            ->delete();
    }
}