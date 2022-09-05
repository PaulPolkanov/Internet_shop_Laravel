<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Category;
//use App\Http\Validators\CategoryValidator;

class AddCategory implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    private $name;
    private $desc;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($request)
    {
        $this->name=$request->name;;
        $this->desc=$request->description;;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
            $category = new Category;
            $category->name = $this->name;
            $category->description = $this->desc;
            $category->save();
    }
}
