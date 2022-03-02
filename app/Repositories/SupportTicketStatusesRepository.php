<?php

namespace App\Repositories;

use App\LegacyNetwork\Repositories\Eloquent\Repository;
use App\Models\SupportTickets;
use App\Models\SupportTicketStatuses;

class SupportTicketStatusesRepository extends Repository
{
    function model()
    {
        return SupportTicketStatuses::class;
    }

}