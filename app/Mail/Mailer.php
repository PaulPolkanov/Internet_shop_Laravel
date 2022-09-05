<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Mailer extends Mailable
{
    use Queueable, SerializesModels;
    private $data;
    public $view;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data, $view)
    {
        $this->data = $data;
        $this->view = $view;
        //$this->msg = $msg;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //dd($this->request);
        $data = $this->data;
        return $this->view('mail.'.$this->view, compact('data'));
    }
}
