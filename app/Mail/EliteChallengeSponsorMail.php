<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EliteChallengeSponsorMail extends Mailable
{
    use Queueable, SerializesModels;
    /**
     * @var User
     */
    public $participant;

    /**
     * Create a new message instance.
     *
     * @param User $participant
     */
    public function __construct(User $participant)
    {
        $this->participant = $participant;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject('Congratulations! ' . $this->participant->full_name . ' just enrolled into the Elite Health Challenge')
            ->view('emails.betaV3.elite_challenge_sign_up_for_sponsor');
    }
}
