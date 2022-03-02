<?php

namespace App\Services;

use App\LegacyNetwork\Repositories\Services\Services;
use App\Repositories\SendInvitesRepository;
use Carbon\Carbon;
use Illuminate\Container\Container as App;

class SendInvitesServices extends Services
{
    function repository()
    {
        return SendInvitesRepository::class;
    }
  
     public function create(array $data)
    {
        $data['status'] = "send";
        $data['user_id'] = user()->id;

        return $this->repository->create($data);
    }

        public function getAllSendInvites()
    {
        return $this->repository->getAllSendInvites(user()->id);
    }
    
}