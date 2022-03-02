<?php

namespace App\Services;

use App\LegacyNetwork\Repositories\Services\Services;
use App\Mail\MeetingCreated;
use App\Models\Meetings;
use App\Repositories\BroadcastCommentsRepository;
use App\Repositories\MeetingsRepository;
use App\Repositories\UserMeetingsRepository;
use App\Repositories\UsersRepository;
use Carbon\Carbon;
use Illuminate\Container\Container as App;
use Mail;

class BroadcastCommentsServices extends Services
{
    /** @var  BroadcastCommentsRepository */
    protected $repository;

    function repository()
    {
        return BroadcastCommentsRepository::class;
    }

    public function getAllCommentsWithUsers()
    {
        return $this->repository->getAllCommentsWithUsers();
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