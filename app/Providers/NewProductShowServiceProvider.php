<?php
 
namespace App\Providers;
 
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Category;
use App\Models\Product;
use App\Models\SocialNetwork;
use Illuminate\Support\Facades\Http;


class NewProductShowServiceProvider extends ServiceProvider{
    public function boot()
    {
        View::composer('layouts/default', function ($view) {
            //$socialLinks = SocialNetwork::get();
            $request = Http::post('http://localhost/example-app/public/api/new-products', ['flag' => 1])['data'];
            //$request = 1;
            $data = [];
            foreach($request as $id){
                array_push($data, Product::where('id', $id)->first());
            }
            $view->with('widget_NewProd', view('providers.newproducts', compact('data')));
        });
    }
}

