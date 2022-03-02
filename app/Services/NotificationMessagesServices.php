<?php

namespace App\Services;

use App\LegacyNetwork\Repositories\Services\Services;
use App\Repositories\NotificationMessagesRepository;

class NotificationMessagesServices extends Services
{
    /** @var NotificationMessagesRepository $repository  */
    protected $repository;

    function repository()
    {
        return NotificationMessagesRepository::class;
    }


    public function getAllNotificationsWithUsers()
    {
        return $this->repository->getAllDeletedByUserId();
    }

    public function polling()
    {
        return $this->repository->polling();
    }

    public function mass_delete(array $data)
    {
        return $this->repository->mass_delete($data);
    }


}