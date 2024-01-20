<?php

namespace App\Events;

use Illuminate\Support\Facades\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class SendMail extends Event
{
    use SerializesModels;
    public $mail;
    public function __construct($mail)
    {
        $this->mail = $mail;
    }
    public function broadcastOn()
    {
        return [];
    }
}