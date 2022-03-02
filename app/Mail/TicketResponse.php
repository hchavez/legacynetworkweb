<?php

namespace App\Mail;

use App\Models\SupportTickets;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TicketResponse extends Mailable
{
    use Queueable, SerializesModels;
    /**
     * @var User
     */
    public $user;
    /**
     * @var SupportTickets
     */
    public $ticket;
    /**
     * @var
     */
    public $response;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, SupportTickets $ticket, $response)
    {

        $this->user = $user;
        $this->ticket = $ticket;
        $this->response = $response;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.ticket_response');
    }
}
