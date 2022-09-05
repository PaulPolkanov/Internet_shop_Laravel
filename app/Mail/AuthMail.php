<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AuthMail extends Mailable
{
    use Queueable, SerializesModels;
    private $name;
    private $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct( $name, $data)
    {
        //data , name
        $this->name = $name;
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $name = $this->name;
        $msg = $this->data;
        return $this->view('mail.test', compact('name', 'msg'));
    }
}
