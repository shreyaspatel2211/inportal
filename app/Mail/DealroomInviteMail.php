<?php

namespace App\Mail;

use App\Models\DealRoom;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DealroomInviteMail extends Mailable
{
    use Queueable, SerializesModels;

    public $dealroom;
    public $user;

    public function __construct(DealRoom $dealroom, $user)
    {
        $this->dealroom = $dealroom;
        $this->user = $user;
    }

    public function build()
    {
        return $this->subject('You have been invited to a DealRoom')
                    ->markdown('emails.dealroom.invite');
    }
}
