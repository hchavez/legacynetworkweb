<?php

namespace App\Services;

use App\LegacyNetwork\Repositories\Services\Services;
use App\Repositories\SupportTicketCategoriesRepository;

class SupportTicketCategoriesServices extends Services
{
    function repository()
    {
        return SupportTicketCategoriesRepository::class;
    }

    public function create(array $data)
    {
        if (!isset($data['description'])) {
            $data['description'] = "";
        }
        return $this->repository->create($data);
    }
}