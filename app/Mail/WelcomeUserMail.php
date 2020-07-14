<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WelcomeUserMail extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;
    public $studentData;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($studentData)
    {
        $this->studentData = $studentData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.admin.welcome-user');
    }
}
