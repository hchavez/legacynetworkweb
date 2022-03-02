<?php

namespace App\Mail;

use App\Models\Meetings;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TeamMeetingCreatedForSponsor extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    /**
     * @var Meetings
     */
    public $meeting;

    /**
     * Create a new message instance.
     *
     * @param User $user
     * @param Meetings $meeting
     */
    public function __construct(User $user, Meetings $meeting)
    {
        $this->user = $user;
        $this->meeting = $meeting;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject("You're hosting a Team Meeting")
            ->view('emails.team_meeting_created_for_sponsor');
    }
}
