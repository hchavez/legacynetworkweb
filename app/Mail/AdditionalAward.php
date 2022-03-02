<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdditionalAward extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $additionalAward;

    /**
     * Create a new message instance.
     *
     * @param User $user
     */
    public function __construct(User $user, $awardName)
    {
        $this->user = $user;
        $this->additionalAward = $awardName;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.additional_award');
    }
}
