<?php

namespace App\Mail;

use App\Interfaces\AchievementLevelInterface;
use App\Models\AchievementLevels;
use App\Models\BonusPaths;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MemberAchievementApproved extends Mailable
{
    use Queueable, SerializesModels;
    /**
     * @var User
     */
    public $user;
    public $achievementLevel;

    /**
     * Create a new message instance.
     *
     * @param User $user
     */
    public function __construct(User $user, AchievementLevelInterface $achievementLevel)
    {
        $this->user = $user;
        $this->achievementLevel = $achievementLevel;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        switch (get_class($this->achievementLevel)) {
            case BonusPaths::class:
                $view = 'emails.bonus_achievement_approved';
                $subjectMap = [
                    1 => 'Congratulations! You have been approved for your Business Builder Bonus!',
                    2 => 'Congratulations! You have been approved for your Team Leader-Plus Bonus!',
                    3 => 'Congratulations! You have been approved for your Team Manager-Plus Bonus!',
                ];
                break;
            case AchievementLevels::class:
                $view = 'emails.member_achievement_approved';
                $subjectMap = [
                    1 => 'Congratulations! You have completed the Certification Level!',
                    2 => 'Congratulations! You have completed Achievement Level 1!',
                    3 => 'Congratulations! You have completed Achievement Level 2!',
                    4 => 'Congratulations! You have completed Achievement Level 3!',
                    5 => 'Congratulations! You have completed Achievement Level 4!',
                    6 => 'Congratulations! You have completed Achievement Level 5!',
                    7 => 'Congratulations! You have completed Achievement Level 6!',
                    8 => 'Congratulations! You have completed Achievement Level 7!',
                    9 => 'Congratulations! You have completed Achievement Level 8!',
                    10 => 'Congratulations! You have completed Achievement Level 9!',
                    11 => 'Congratulations! You have completed Achievement Level 10!',
                    12 => 'Congratulations! You have completed Achievement Level 11!',
                    13 => 'Congratulations! You have completed Achievement Level 12!',
                ];
                break;
            default:
                $view = 'emails.member_achievement_approved';
                $subjectMap = [
                    1 => 'Congratulations! You have completed the Certification Level!',
                    2 => 'Congratulations! You have completed Achievement Level 1!',
                    3 => 'Congratulations! You have completed Achievement Level 2!',
                    4 => 'Congratulations! You have completed Achievement Level 3!',
                    5 => 'Congratulations! You have completed Achievement Level 4!',
                    6 => 'Congratulations! You have completed Achievement Level 5!',
                    7 => 'Congratulations! You have completed Achievement Level 6!',
                    8 => 'Congratulations! You have completed Achievement Level 7!',
                    9 => 'Congratulations! You have completed Achievement Level 8!',
                    10 => 'Congratulations! You have completed Achievement Level 9!',
                    11 => 'Congratulations! You have completed Achievement Level 10!',
                    12 => 'Congratulations! You have completed Achievement Level 11!',
                    13 => 'Congratulations! You have completed Achievement Level 12!',
                ];
                break;
        }

        return $this
            ->subject($subjectMap[$this->achievementLevel->id])
            ->view($view);

    }
}
