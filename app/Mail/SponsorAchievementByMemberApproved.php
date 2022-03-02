<?php

namespace App\Mail;

use App\Interfaces\AchievementLevelInterface;
use App\Models\AchievementLevels;
use App\Models\BonusPaths;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SponsorAchievementByMemberApproved extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $sponsor;
    public $achievementLevel;

    /**
     * Create a new message instance.
     *
     * @param User $user
     */
    public function __construct(User $user, User $sponsor, AchievementLevelInterface $achievementLevel)
    {
        $this->user = $user;
        $this->sponsor = $sponsor;
        $this->achievementLevel = $achievementLevel;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $userFullName = $this->user->full_name;

        switch (get_class($this->achievementLevel)) {
            case BonusPaths::class:
                $view = 'emails.bonus_achievement_by_member_approved';
                $subjectMap = [
                    1 => 'Your Team Member has been approved to receive the Business Builder Bonus!',
                    2 => 'Your Team Member has been approved to receive the Team Leader-Plus Bonus!',
                    3 => 'Your Team Member has been approved to receive the Team Manager-Plus Bonus!',
                ];
                break;
            case AchievementLevels::class:
                $view = 'emails.achievement_by_member_approved';
                $subjectMap = [
                    1 => "Congratulations! $userFullName has completed the Certification Level!",
                    2 => "Congratulations! $userFullName has completed Achievement Level 1!",
                    3 => "Congratulations! $userFullName has completed Achievement Level 2!",
                    4 => "Congratulations! $userFullName has completed Achievement Level 3!",
                    5 => "Congratulations! $userFullName has completed Achievement Level 4!",
                    6 => "Congratulations! $userFullName has completed Achievement Level 5!",
                    7 => "Congratulations! $userFullName has completed Achievement Level 6!",
                    8 => "Congratulations! $userFullName has completed Achievement Level 7!",
                    9 => "Congratulations! $userFullName has completed Achievement Level 8!",
                    10 => "Congratulations! $userFullName has completed Achievement Level 9!",
                    11 => "Congratulations! $userFullName has completed Achievement Level 10!",
                    12 => "Congratulations! $userFullName has completed Achievement Level 11!",
                    13 => "Congratulations! $userFullName has completed Achievement Level 12!",
                ];
                break;
            default:
                $view = 'emails.achievement_by_member_approved';
                $subjectMap = [
                    1 => "Congratulations! $userFullName has completed the Certification Level!",
                    2 => "Congratulations! $userFullName has completed Achievement Level 1!",
                    3 => "Congratulations! $userFullName has completed Achievement Level 2!",
                    4 => "Congratulations! $userFullName has completed Achievement Level 3!",
                    5 => "Congratulations! $userFullName has completed Achievement Level 4!",
                    6 => "Congratulations! $userFullName has completed Achievement Level 5!",
                    7 => "Congratulations! $userFullName has completed Achievement Level 6!",
                    8 => "Congratulations! $userFullName has completed Achievement Level 7!",
                    9 => "Congratulations! $userFullName has completed Achievement Level 8!",
                    10 => "Congratulations! $userFullName has completed Achievement Level 9!",
                    11 => "Congratulations! $userFullName has completed Achievement Level 10!",
                    12 => "Congratulations! $userFullName has completed Achievement Level 11!",
                    13 => "Congratulations! $userFullName has completed Achievement Level 12!",
                ];
                break;
        }


        return $this
            ->subject($subjectMap[$this->achievementLevel->id])
            ->view($view);
    }
}
