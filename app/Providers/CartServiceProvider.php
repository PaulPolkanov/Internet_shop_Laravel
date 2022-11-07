<?php

namespace App\Providers;

use App\Models\Order_Product;
use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class CartServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer('layouts/default', function ($view) {
            $products = Session::get('products');
            $order_id = Session::get('order');
            $count_products = 0;
            if(is_array($products) && count($products) != 0){
                $count_products = count($products);
            }
            if($order_id != null){
                //count(Order_Product::whereIn('id_order', $order_id)->first())
                $count_products = count(Order_Product::where('id_order', $order_id)->get());
            }
            $view->with('widget_cart', view('providers.cart', compact('count_products')));
        });
    }
}
