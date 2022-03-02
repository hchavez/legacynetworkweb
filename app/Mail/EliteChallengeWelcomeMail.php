<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EliteChallengeWelcomeMail extends Mailable
{
    use Queueable, SerializesModels;
    /**
     * @var bool
     */
    public $newCustomer;

    /**
     * Create a new message instance.
     *
     * @param bool $newCustomer
     */
    public function __construct($newCustomer = true)
    {
        $this->newCustomer = $newCustomer;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject('Welcome to the Elite Health Challenge!')
            ->view('emails.betaV3.elite_challenge_sign_up');
    }
}
