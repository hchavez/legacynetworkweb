<?php

namespace App\Mail;

use App\Models\Meetings;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TeamMeetingCreatedForParticipants extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    public $creator;
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
    public function __construct(User $user, Meetings $meeting, User $creator)
    {
        $this->user = $user;
        $this->meeting = $meeting;
        $this->creator = $creator;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject("You're upcoming Team Meeting")
            ->view('emails.team_meeting_created_for_participants');
    }
}
