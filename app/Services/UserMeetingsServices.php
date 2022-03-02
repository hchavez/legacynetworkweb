<?php

namespace App\Services;

use App\LegacyNetwork\Repositories\Services\Services;
use App\Repositories\UserMeetingsRepository;

class UserMeetingsServices extends Services
{
    function repository()
    {
        return UserMeetingsRepository::class;
    }

}