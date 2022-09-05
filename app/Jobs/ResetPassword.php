<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\Mailer;
use Illuminate\Support\Facades\Mail;

class ResetPassword implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    private $view = 'resetMail';
    private $data;
    private $email;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->email = $user->email;
        date_default_timezone_set('Europe/Moscow');
        $this->data= [
            'name' => $user->name,
            'img' => $user->img,
            'token' => $user->token,
            'date' => date('l jS \of F Y h:i:s A'),
        ];
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $view = $this->view;
        $data = $this->data;
        $email = $this->email;
        Mail::to($email)->send(new Mailer($data, $view));
    }
}
