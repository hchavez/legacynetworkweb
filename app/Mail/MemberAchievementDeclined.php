<?php

namespace App\Mail;

use App\Interfaces\AchievementLevelInterface;
use App\Models\AchievementLevels;
use App\Models\BonusPaths;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MemberAchievementDeclined extends Mailable
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
                $view = 'emails.bonus_achievement_declined';

                break;
            case AchievementLevels::class:
                $view = 'emails.member_achievement_declined';

                break;
            default:
                $view = 'emails.member_achievement_declined';

                break;
        }

        return $this
            ->subject('Almost there!')
            ->view($view);
    }
}
