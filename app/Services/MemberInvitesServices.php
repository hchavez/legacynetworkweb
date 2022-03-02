<?php

namespace App\Services;

use App\LegacyNetwork\Repositories\Services\Services;
use App\Repositories\MemberInvitesRepository;
use App\User;
use Mail;

class MemberInvitesServices extends Services
{
    /** @var MemberInvitesRepository */
    protected $repository;

    function repository()
    {
        return MemberInvitesRepository::class;
    }

    public function updateByToken($data, $token)
    {
        return $this->repository->updateByToken($data, $token);
    }

    public function getInvitesByUser(User $user)
    {
        return $this->repository->getInvitesByUser($user);
    }
}