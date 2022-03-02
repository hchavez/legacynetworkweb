<?php

namespace App\Mail;

use App\Interfaces\AchievementLevelInterface;
use App\Models\AchievementLevels;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SynergyNewAchievementRequestCreated extends Mailable
{
    use Queueable, SerializesModels;
    /**
     * @var User
     */
    public $user;
    /**
     * @var AchievementLevels
     */
    public $achievementLevel;

    /**
     * Create a new message instance.
     *
     * @param User $user
     * @param AchievementLevelInterface $achievementLevel
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
        return $this
            ->subject('Legacy Network ' . $this->achievementLevel->name . ' Confirmation Request')
            ->view('emails.synergy.new_achievement_request_created');
    }
}
