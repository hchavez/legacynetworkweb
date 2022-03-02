<?php

namespace App\Services;

use App\LegacyNetwork\Repositories\Services\Services;
use App\Repositories\EventsStatusesRepository;
use App\Repositories\UserEventsRepository;
use App\Repositories\UsersRepository;
use Illuminate\Container\Container as App;
use Illuminate\Support\Facades\Log;

class UserEventsServices extends Services
{
    /** @var  UserEventsRepository $repository */
    protected $repository;
    /**
     * @var EventsStatusesRepository
     */
    private $eventsStatusesRepository;
    /**
     * @var UsersRepository
     */
    private $usersRepository;

    public function __construct(App $app, EventsStatusesRepository $eventsStatusesRepository, UsersRepository $usersRepository) {
        $this->eventsStatusesRepository = $eventsStatusesRepository;
        $this->usersRepository = $usersRepository;
        parent::__construct($app);
    }
    function repository()
    {
        return UserEventsRepository::class;
    }

    public function create(array $data)
    {
        $event_status = $this->eventsStatusesRepository->findBy('name', $data['status']);
        $data['user_id'] = user()->id;
        $data['status_id'] = $event_status->id;
        return $this->repository->create($data);
    }

    public function update(array $data, $id)
    {
        $res = $this->repository->update([
            'status_id' => $data['status_id']
        ], $id);

        if ($res && $data['status_id'] == 3) {
            $user = $this->usersRepository->find($data['user_id']);
            switch($data['event_name']) {
                case "Leadership Summit": assignRole($user,'Leadership Summit Attendee'); break;
                case "Financial Summit": assignRole($user,'Financial Summit Attendee'); break;
                case "Legacy Summit": assignRole($user,'Legacy Summit Attendee'); break;
                default: break;
            }
        }

        return $res;
    }

}