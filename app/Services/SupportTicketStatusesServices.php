<?php

namespace App\Services;

use App\LegacyNetwork\Repositories\Services\Services;
use App\Repositories\SupportTicketStatusesRepository;

class SupportTicketStatusesServices extends Services
{
    function repository()
    {
        return SupportTicketStatusesRepository::class;
    }
}