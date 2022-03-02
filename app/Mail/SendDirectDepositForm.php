<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendDirectDepositForm extends Mailable
{
    use Queueable, SerializesModels;
    /**
     * @var User
     */
    public $member;
    /**
     * @var
     */
    private $pdf;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $member, $pdf)
    {
        $this->member = $member;
        $this->pdf = $pdf;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject('Direct Deposit Form')
            ->view('emails.send_direct_deposit_form')
            ->attachData($this->pdf, 'DirectDepositForm.pdf')
            ;
    }
}
