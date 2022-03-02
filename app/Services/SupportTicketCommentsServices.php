<?php

namespace App\Services;

use App\LegacyNetwork\Repositories\Services\Services;
use App\Repositories\SupportTicketCommentsRepository;

class SupportTicketCommentsServices extends Services
{
    function repository()
    {
        return SupportTicketCommentsRepository::class;
    }

    public function getAllCommentsByTicketId($id)
    {
        return $this->repository->getAllCommentsByTicketId($id);
    }
}