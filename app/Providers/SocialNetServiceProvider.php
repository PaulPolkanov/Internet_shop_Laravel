<?php
 
namespace App\Providers;
 
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Category;
use App\Models\Product;
use App\Models\SocialNetwork;
use Illuminate\Support\Facades\Http;

class SocialNetServiceProvider extends ServiceProvider{
    public function boot()
    {
        View::composer('layouts/default', function ($view) {
            //$socialLinks = SocialNetwork::get();
            $request = Http::get('http://localhost/example-app/public/api/sotial-links')['data'];
            //$request = 1;
            $view->with('widget_socialNet', view('providers.socialNet', compact('request')));
        });
    }
}

