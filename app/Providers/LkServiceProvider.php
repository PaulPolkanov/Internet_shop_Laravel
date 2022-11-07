<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class LkServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer('layouts/default', function ($view) {
            $name = null;
            if(Auth::check()){
                $user = Auth::check();
                $name = 'admin';
            }
            $view->with('widget_lk', view('providers.lk', compact('name')));
        });
    }
}
