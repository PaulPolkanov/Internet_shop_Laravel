<?php
 
namespace App\Providers;
 
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Category;
 
class MainmenuServiceProvider extends ServiceProvider{
    public function boot()
    {
        View::composer('layouts/default', function ($view) {
            $category = Category::get();
            $view->with('widget_main_menu', view('providers.mainmenu', compact('category')));
        });
    }
}

