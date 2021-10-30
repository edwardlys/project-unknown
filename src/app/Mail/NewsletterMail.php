<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewsletterMail extends Mailable
{
    use Queueable, SerializesModels;

    public $title;
    public $description;
    public $username;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($title, $description, $username)
    {
        $this->title = $title;
        $this->description = $description;
        $this->username = $username;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->title)
            ->view('mail.newsletter');
    }
}
