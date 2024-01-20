<?php

namespace App\Listeners;

use Mail;
use App\Models\User;
use App\Events\SendMail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMailFired implements ShouldQueue
{
    public function __construct()
    {
        
    }
    public function handle(SendMail $event)
    {
        $mailContents = $event->mail; 

        Mail::send('emails.contact_email', ['mailContents' => $mailContents], function ($message) use ($mailContents) {
            $message->subject('Contact Email');
            $message->to($mailContents->email);
        });
    }
}
