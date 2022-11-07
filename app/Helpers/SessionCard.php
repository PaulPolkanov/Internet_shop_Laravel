<?php
    namespace App\Helpers;

use App\Models\Product;
use Illuminate\Support\Facades\Session;

    class SessionCard{
        static function addProduct($id){
            //$products = [];
            $products = Session::get('products');
            if(empty($products) || !in_array($id, $products)){
                $products[] = $id;
                Session::put('products', $products);
            }
        }
    }