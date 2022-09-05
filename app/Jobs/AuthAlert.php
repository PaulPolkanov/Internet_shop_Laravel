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
use App\Models\User;

class AuthAlert implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    private $view = 'test';
    private $data;
    private $email;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($request)
    {
        //dd($request);
        date_default_timezone_set('Europe/Moscow');
        $this->data = [
            'name' => $request->name,
            'date' => date('l jS \of F Y h:i:s A'),
            'img' => User::where('email', $request->email)->first()->img,
        ];
        $this->email = $request->email;
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
