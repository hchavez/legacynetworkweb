<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactSendEmail extends Mailable
{
    use Queueable, SerializesModels;
    /**
     * @var
     */
    public $message_;
    public $from_;
    public $name_;

    /**
     * Create a new message instance.
     *
     * @param $from
     * @param $message
     */
    public function __construct($from_, $message_, $name_)
    {
        $this->message_ = $message_;
        $this->from_ = $from_;
        $this->name_ = $name_;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from($this->from_)
            ->subject("$this->name_ just contacted you through your Legacy Network website!")
            ->view('emails.contact_send_email');
    }
}
