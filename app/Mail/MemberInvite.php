<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MemberInvite extends Mailable
{
    use Queueable, SerializesModels;
    /**
     * @var User
     */
    public $user;
    public $link;
    public $recipient_name;
    public $body;
    public $subject;

    /**
     * Create a new message instance.
     *
     * @param User $user
     */
    public function __construct(User $user, $recipient_name, $token, $body = '', $subject = 'Check this out!')
    {
        $this->user = $user;
        $this->body = $body;
        $this->subject = $subject;
        $this->link = url('') . '/' . $user->purl . '?token=' . $token;
        $this->recipient_name = $recipient_name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject($this->subject)
            ->view('emails.member_invite');
    }
}
