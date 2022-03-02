<?php

namespace App\Mail;

use App\Interfaces\AchievementLevelInterface;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SponsorNewAchievementByMemberCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $sponsor;
    public $achievementLevel;

    /**
     * Create a new message instance.
     *
     * @param User $sponsor
     * @param AchievementLevelInterface $achievementLevel
     */
    public function __construct(User $user, User $sponsor, AchievementLevelInterface $achievementLevel)
    {
        $this->sponsor = $sponsor;
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
            ->subject('New Achievement has been requested by one of your Team Members')
            ->view('emails.new_achievement_request_created');
    }
}
