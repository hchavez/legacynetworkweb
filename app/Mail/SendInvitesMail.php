<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendInvitesMail extends Mailable
{

    use Queueable, SerializesModels;
    /**
     * @var User
     */
    public $body;
    public $link;
    public $name;
    public $purl;
    public $sender_name;
    public $subject;

    /**
     * Create a new message instance.
     *
     * @param User $user
     */
    public function __construct($purl,$sender_name,$name,$body = '',$subject,$link)
    {
        $this->body = $body;
        $this->subject = $subject;
        $this->link = $link;
        $this->name = $name;
        $this->purl = $purl;
        $this->sender_name = $sender_name;
    }

    /**
     * Build the message.
     *
     * @return $this    
     */
    public function build()
    {
        if($this->body == 'Email to contact about ProArgi 9+'){
            return $this->subject($this->subject)
                ->view('emails.proargi');
        }
        
        if($this->body == 'Email to contact about Metabolic LDL'){
            return $this->subject($this->subject)
                ->view('emails.metaldl');
        }
        
        if($this->body == 'Email to contact about Biome Shake'){
            return $this->subject($this->subject)
                ->view('emails.biomeshake');
        }

        if($this->body == 'Email to contact about Biome Balance'){
            return $this->subject($this->subject)
                ->view('emails.biomebalance');
        }

        
        if($this->body == 'Email to contact about Biome DTX'){
            return $this->subject($this->subject)
                ->view('emails.biomedtx');
        }else{
            return $this->subject($this->subject)
                ->view('emails.send_invite');
        }

    }
}
