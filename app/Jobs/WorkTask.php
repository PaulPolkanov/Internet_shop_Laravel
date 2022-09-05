<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;

class WorkTask implements ShouldQueue
{
    //public $timestamps = false;
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    private $param;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($param)
    {
        $this->param = $param;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $tag = new Tag;
        $tag->name = $this->param;
        $tag->save();
    }
}
