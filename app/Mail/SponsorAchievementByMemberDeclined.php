<?php

namespace App\Mail;

use App\Interfaces\AchievementLevelInterface;
use App\Models\AchievementLevels;
use App\Models\BonusPaths;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SponsorAchievementByMemberDeclined extends Mailable
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
        switch (get_class($this->achievementLevel)) {
            case BonusPaths::class:
                $view = 'emails.bonus_achievement_by_member_declined';
                $subjectMap = [
                    1 => 'Your Team Member’s bonus request: support needed',
                    2 => 'Your Team Member’s bonus request: support needed',
                    3 => 'Your Team Member’s bonus request: support needed',
                ];
                break;
            case AchievementLevels::class:
                $view = 'emails.achievement_by_member_declined';
                $subjectMap = [
                    0 => "Oops! You're Team Member is almost there!",
                    1 => "Oops! You're Team Member is almost there!",
                    2 => "Oops! You're Team Member is almost to Level 1!",
                    3 => "Oops! You're Team Member is almost to Level 2!",
                    4 => "Oops! You're Team Member is almost to Level 3!",
                    5 => "Oops! You're Team Member is almost to Level 4!",
                    6 => "Oops! You're Team Member is almost to Level 5!",
                    7 => "Oops! You're Team Member is almost to Level 6!",
                    8 => "Oops! You're Team Member is almost to Level 7!",
                    9 => "Oops! You're Team Member is almost to Level 8!",
                    10 => "Oops! You're Team Member is almost to Level 9!",
                    11 => "Oops! You're Team Member is almost to Level 10!",
                    12 => "Oops! You're Team Member is almost to Level 11!",
                    13 => "Oops! You're Team Member is almost to Level 12!",
                ];
                break;
            default:
                $view = 'emails.achievement_by_member_declined';
                $subjectMap = [
                    0 => "Oops! You're Team Member is almost there!",
                    1 => "Oops! You're Team Member is almost there!",
                    2 => "Oops! You're Team Member is almost to Level 1!",
                    3 => "Oops! You're Team Member is almost to Level 2!",
                    4 => "Oops! You're Team Member is almost to Level 3!",
                    5 => "Oops! You're Team Member is almost to Level 4!",
                    6 => "Oops! You're Team Member is almost to Level 5!",
                    7 => "Oops! You're Team Member is almost to Level 6!",
                    8 => "Oops! You're Team Member is almost to Level 7!",
                    9 => "Oops! You're Team Member is almost to Level 8!",
                    10 => "Oops! You're Team Member is almost to Level 9!",
                    11 => "Oops! You're Team Member is almost to Level 10!",
                    12 => "Oops! You're Team Member is almost to Level 11!",
                    13 => "Oops! You're Team Member is almost to Level 12!",
                ];
                break;
        }

        return $this
            ->subject($subjectMap[$this->achievementLevel->id])
            ->view($view);
    }
}
