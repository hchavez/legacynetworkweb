<?php

namespace App\Services;

use App\LegacyNetwork\Repositories\Services\Services;
use App\Mail\MemberAchievementApproved;
use App\Mail\MemberAchievementDeclined;
use App\Mail\SponsorAchievementByMemberApproved;
use App\Mail\SponsorAchievementByMemberDeclined;
use App\Mail\SponsorNewAchievementByMemberCreated;
use App\Mail\SynergyNewAchievementRequestCreated;
use App\Repositories\AchievementApprovalsRepository;
use App\Repositories\AchievementLevelsRepository;
use App\Repositories\AdvancedAchievementsRepository;
use App\Repositories\BonusPathsRepository;
use App\Repositories\UsersRepository;
use Illuminate\Container\Container as App;
use Mail;

class AchievementApprovalsServices extends Services
{
    /** @var  AchievementApprovalsRepository $repository */
    protected $repository;
    /**
     * @var UsersRepository
     */
    private $usersRepository;
    /**
     * @var AchievementLevelsRepository
     */
    private $achievementLevelsRepository;
    /**
     * @var App
     */
    private $app;
    /**
     * @var AdvancedAchievementsRepository
     */
    private $advancedAchievementsRepository;
    /**
     * @var BonusPathsRepository
     */
    private $bonusPathsRepository;

    public function __construct(
        App $app,
        UsersRepository $usersRepository,
        AchievementLevelsRepository $achievementLevelsRepository,
        BonusPathsRepository $bonusPathsRepository,
        AdvancedAchievementsRepository $advancedAchievementsRepository
    )
    {
        parent::__construct($app);
        $this->app = $app;
        $this->usersRepository = $usersRepository;
        $this->achievementLevelsRepository = $achievementLevelsRepository;
        $this->advancedAchievementsRepository = $advancedAchievementsRepository;
        $this->bonusPathsRepository = $bonusPathsRepository;
    }

    function repository()
    {
        return AchievementApprovalsRepository::class;
    }

    public function create(array $data)
    {
        $user = $this->usersRepository->find($data['user_id']);

        $sponsor = $user->sponsor;
        if (isset($data['bonus_path_id'])) {
            $achievementLevel = $this->bonusPathsRepository->find($data['bonus_path_id']);
        } else {
            $achievementLevel = $this->advancedAchievementsRepository->find($data['advanced_achievement_level_id']);
        }

        $returnData = $this->repository->create($data);

//        disable sending this email to legacy since they constantly check these
//        Mail::to('legacycustomerservice@synergyworldwide.com')->send(new SynergyNewAchievementRequestCreated($user, $achievementLevel));
//        Mail::to('Andrew@fifthmissionmarketing.com')->send(new SynergyNewAchievementRequestCreated($user, $achievementLevel));
//        if ($sponsor) Mail::to($sponsor->email)->send(new SponsorNewAchievementByMemberCreated($user, $sponsor, $achievementLevel));

        return $returnData;

    }

    public function update(array $data, $id)
    {
        $data = $this->repository->update($data, $id);
        $user = $this->usersRepository->find($data->user_id);
        $sponsor = $user->sponsor;

        if ($data->bonus_path_id) {
            if ($data->status == 'approved') {
                $this->usersRepository->update([
                    'bonus_path_id' => $data->bonus_path_id
                ], $data->user_id);

                Mail::to($user->email)->send(new MemberAchievementApproved($user, $data->bonusPaths));
                if ($sponsor) Mail::to($sponsor->email)->send(new SponsorAchievementByMemberApproved($user, $sponsor, $data->bonusPaths));
            } elseif ($data['status'] == 'disapproved') {
                Mail::to($user->email)->send(new MemberAchievementDeclined($user, $data->bonusPaths));
                if ($sponsor) Mail::to($sponsor->email)->send(new SponsorAchievementByMemberDeclined($user, $sponsor, $data->bonusPaths));
            }
        } elseif($data->advanced_achievement_level_id) {
            if ($data->status == 'approved') {
                switch ($data->advanced_achievement_level_id) {
                    case 1: assignRole($user, 'Leadership Summit Attendee'); break;
                    case 2: assignRole($user, 'Financial Summit Attendee'); break;
                    case 3: assignRole($user, 'Legacy Summit Attendee'); break;
                    case 4: assignRole($user, 'Champion of Children'); break;
                }
            }
        }

        return $data;
    }

}