<?php

namespace App\Repositories;

use App\LegacyNetwork\Repositories\Eloquent\Repository;
use App\Models\SupportTicketCategories;

class SupportTicketCategoriesRepository extends Repository
{
    function model()
    {
        return SupportTicketCategories::class;
    }

}