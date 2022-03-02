<?php

namespace App\Services;

use App\LegacyNetwork\Repositories\Services\Services;
use App\Mail\CertificationMeetingCreatedOtherInvites;
use App\Mail\MeetingCreated;
use App\Mail\TeamMeetingCreated;
use App\Mail\TeamMeetingCreatedForParticipants;
use App\Mail\TeamMeetingCreatedForSponsor;
use App\Models\Meetings;
use App\Repositories\MeetingsRepository;
use App\Repositories\UserMeetingsRepository;
use App\Repositories\UsersRepository;
use Carbon\Carbon;
use Illuminate\Container\Container as App;
use Mail;

class MeetingsServices extends Services
{
    /**
     * @var UserMeetingsRepository
     */
    private $userMeetingsRepository;
    /**
     * @var UsersRepository
     */
    private $usersRepository;

    /**
     * @param App $app
     * @param UserMeetingsRepository $userMeetingsRepository
     * @param UsersRepository $usersRepository
     */
    public function __construct(App $app, UserMeetingsRepository $userMeetingsRepository, UsersRepository $usersRepository)
    {
        parent::__construct($app);
        $this->userMeetingsRepository = $userMeetingsRepository;
        $this->usersRepository = $usersRepository;
    }

    function repository()
    {
        return MeetingsRepository::class;
    }

    public function create(array $data)
    {
        $data['user_id'] = user()->id;
        $data['meeting_outline'] = 'Default Outline';
        $data['meeting_date'] = Carbon::parse($data['meeting_date']);

        $meeting = $this->repository->create($data);
        $this->sendInvitesToUsers($meeting, $data);
        $data['id'] = $meeting->id;
        return $data;
    }

    public function sendInvitesToUsers(Meetings $meeting, array $data)
    {
        $meeting_id = $meeting->id;

        if (isset($data['is_entrepreneurship_meeting']) && $data['is_entrepreneurship_meeting'] == '1') {
            $data['invite_user_id'] = [];

            $parent1 = user()->sponsor;

            if ($parent1) {
                $parent2 = $parent1->sponsor;
                if ($parent2) {
                    $data['invite_user_id'][] = $parent2->id;

                    $parent3 = $parent2->sponsor;
                    if ($parent3) {
                        $data['invite_user_id'][] = $parent3->id;
                    }
                }
            }

            //also invite siblings
            $siblings = $this->usersRepository->getSiblings(user());

            foreach ($siblings as $sibling) {
                $data['invite_user_id'][] = $sibling->id;
            }

            foreach ($data['invite_user_id'] as $user_id) {
                $user = $this->usersRepository->find($user_id);
                if ($user) {
                    $this->userMeetingsRepository->create([
                        'user_id' => $user_id,
                        'meeting_id' => $meeting_id
                    ]);
//                    Mail::to($user->email)->send(new CertificationMeetingCreatedOtherInvites($user, $meeting, user()));
                }
            }

            if ($parent1) {
                Mail::to($parent1->email)->send(new MeetingCreated($parent1));
            }

            return;

        }

        if (isset($data['invite_user_id'])) {
            foreach ($data['invite_user_id'] as $user_id) {
                $user = $this->usersRepository->find($user_id);
                if ($user) {
                    $this->userMeetingsRepository->create([
                        'user_id' => $user_id,
                        'meeting_id' => $meeting_id
                    ]);
                    Mail::to($user->email)->send(new TeamMeetingCreatedForParticipants($user, $meeting, user()));
                }
            }
        }

        if (isset($data['custom_email'])) {
            foreach ($data['custom_email'] as $email) {
                $user = $this->usersRepository->getByEmail($email);
                if ($user) {
                    $this->userMeetingsRepository->create([
                        'user_id' => $user->id,
                        'meeting_id' => $meeting_id
                    ]);
                    Mail::to($user->email)->send(new TeamMeetingCreatedForParticipants($user, $meeting, user()));
                }
            }
        }

        Mail::to(user()->email)->send(new TeamMeetingCreatedForSponsor(user(), $meeting));

    }

}