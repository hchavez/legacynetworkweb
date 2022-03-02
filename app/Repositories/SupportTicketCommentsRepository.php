<?php

namespace App\Repositories;

use App\LegacyNetwork\Repositories\Eloquent\Repository;
use App\Models\SupportTicketComments;

class SupportTicketCommentsRepository extends Repository
{
    function model()
    {
        return SupportTicketComments::class;
    }

    public function getAllCommentsByTicketId($id)
    {
        return $this->model
            ->where('support_ticket_id', $id)
            ->whereNull('deleted_at')
            ->get();
    }
}