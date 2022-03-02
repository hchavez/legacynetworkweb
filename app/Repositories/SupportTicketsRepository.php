<?php

namespace App\Repositories;

use App\LegacyNetwork\Repositories\Eloquent\Repository;
use App\Models\SupportTickets;

class SupportTicketsRepository extends Repository
{
    function model()
    {
        return SupportTickets::class;
    }

    public function getAllUserTickets($user_id)
    {
        return $this->model
            ->with(['status', 'closedBy'])
            ->where('user_id', '=', $user_id)
            ->get();
    }

}