<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotifySponsorNewSignUp extends Mailable
{
    use Queueable, SerializesModels;
    /**
     * @var User
     */
    public $sponsor;
    /**
     * @var User
     */
    public $user;

    /**
     * Create a new message instance.
     *
     * @param User $sponsor
     * @param User $user
     */
    public function __construct(User $sponsor, User $user)
    {
        $this->sponsor = $sponsor;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject('Congratulations! You have a new member!')
            ->view('emails.notify_sponsor_user_sign_up');
    }
}
