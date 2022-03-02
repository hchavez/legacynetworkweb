<?php

namespace App\Repositories;

use App\LegacyNetwork\Repositories\Eloquent\Repository;
use App\Models\MemberInvites;
use App\User;

class MemberInvitesRepository extends Repository
{
    function model()
    {
        return MemberInvites::class;
    }

    public function updateByToken($data, $token)
    {
        return $this->model
            ->where('token', '=', $token)
            ->update($data);
    }

    public function getInvitesByUser(User $user)
    {
        return $this->model
            ->where('user_id', '=', $user->id)
            ->whereNull('deleted_at')
            ->get();
    }
}