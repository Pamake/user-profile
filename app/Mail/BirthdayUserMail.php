<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class BirthdayUserMail extends Mailable
{
    use Queueable, SerializesModels;
    public  $data;

    /**
     * Create a new message instance.
     *
     * @param void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.birthdayUser')->with(['data', $this->data]);
    }
}
