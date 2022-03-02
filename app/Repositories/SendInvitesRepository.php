<?php

namespace App\Repositories;

use App\LegacyNetwork\Repositories\Eloquent\Repository;
use App\Models\SendInvites;
use DB;

class SendInvitesRepository extends Repository
{
    function model()
    {
        return SendInvites::class;
    }

   public function getAllSendInvites($user_id)
    {
        return $this->model
            //->with(['status', 'closedBy'])
            ->where('user_id', '=', $user_id)
            ->orderBy('created_at', 'desc')
            ->get();
    }


}