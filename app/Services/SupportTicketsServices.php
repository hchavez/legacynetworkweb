<?php

namespace App\Services;

use App\LegacyNetwork\Repositories\Services\Services;
use App\Repositories\SupportTicketsRepository;
use App\Repositories\SupportTicketStatusesRepository;
use Carbon\Carbon;
use Illuminate\Container\Container as App;

class SupportTicketsServices extends Services
{
    /**
     * @var SupportTicketStatusesRepository
     */
    private $ticketStatusesRepository;

    /**
     * @param App $app
     * @param SupportTicketStatusesRepository $ticketStatusesRepository
     */
    public function __construct(App $app, SupportTicketStatusesRepository $ticketStatusesRepository) {
        $this->ticketStatusesRepository = $ticketStatusesRepository;
        parent::__construct($app);
    }
    function repository()
    {
        return SupportTicketsRepository::class;
    }

    public function create(array $data)
    {
        $data['status_id'] = 1;
        $data['user_id'] = user()->id;
        if (isset($data['file'])) {
            $data['file']->storePublicly('ticket_attachment');
            $data['attachment'] = $data['file']->hashName();
        }

        return $this->repository->create($data);
    }

    public function update(array $data, $id)
    {
        if (isset($data['closed_date']) && $data['closed_date'] == 1) {
            $closedStatus = $this->ticketStatusesRepository->findBy('name', 'closed');
            $data['closed_date'] = Carbon::now();
            $data['status_id'] = $closedStatus->id;
        }

        if (isset($data['reopen']) && $data['reopen'] == 1) {
            $closedStatus = $this->ticketStatusesRepository->findBy('name', 'open');
            $data['closed_date'] = null;
            $data['status_id'] = $closedStatus->id;
            unset($data['reopen']);
        }

        return $this->repository->update($data, $id);
    }

    public function getAllUserTickets()
    {
        return $this->repository->getAllUserTickets(user()->id);
    }
}