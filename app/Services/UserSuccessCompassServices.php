<?php

namespace App\Services;

use App\LegacyNetwork\Repositories\Services\Services;
use App\Repositories\UserSuccessCompassRepository;
use Carbon\Carbon;

class UserSuccessCompassServices extends Services
{
    function repository()
    {
        return UserSuccessCompassRepository::class;
    }

    public function getUserSuccessCompassList()
    {
        return $this->repository->getUserSuccessCompassList(user());
    }

    public function create(array $data)
    {
        if (isset($data['date']) && $data['date'] != '') {
            $data['date'] = Carbon::parse($data['date']);
        }

        $data['user_id'] = user()->id;

        return $this->repository->create($data);
    }

    public function update(array $data, $id)
    {
        $data['user_id'] = user()->id;

        if (isset($data['date']) && $data['date'] != '') {
            $data['date'] = Carbon::parse($data['date']);
        }

        return $this->repository->update($data, $id);
    }

    public function changeStatus($data)
    {
        $item = $this->repository->find($data['commitment_id']);

        //delete older records
        $this->repository->deletePreviousCompleteRecords($item->user_id, $item->success_compass_id, $item->id);

        return $this->repository->update([
            'is_complete' => 1,
            'complete_date' => Carbon::now(),
        ], $item->id);
    }

    public function getCompletedSuccessCompass($user_id)
    {
        return $this->repository->getCompletedSuccessCompass($user_id);
    }
}