<?php

namespace App\Observers;

use App\Services\SuccessCompassServices;
use App\Services\UserSuccessCompassServices;
use App\User;

class UserObserver
{
    /**
     * @var SuccessCompassServices
     */
    private $successCompassServices;
    /**
     * @var UserSuccessCompassServices
     */
    private $userSuccessCompassServices;

    /**
     * @param SuccessCompassServices $successCompassServices
     * @param UserSuccessCompassServices $userSuccessCompassServices
     */
    public function __construct(
        SuccessCompassServices $successCompassServices,
        UserSuccessCompassServices $userSuccessCompassServices)
    {

        $this->successCompassServices = $successCompassServices;
        $this->userSuccessCompassServices = $userSuccessCompassServices;
    }

    /**
     * Listen to the User created event.
     *
     * @param  \App\User $user
     */
    public function created(User $user)
    {

    }

    /**
     * Listen to the User deleting event.
     *
     * @param  \App\User $user
     * @return void
     */
    public function deleting(User $user)
    {
        //
    }
}