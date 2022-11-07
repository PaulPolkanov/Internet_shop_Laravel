<?php
    namespace App\Helpers;

use App\Models\Product;
use Illuminate\Support\Facades\Redirect;

    class CheckForExisisting{
        static function product($id){
            $product = Product::where('$id', $id)->first();
            return (is_array($product) && count($product) > 0) ? true:false;
        }
        static function products($id_products){
            //dd($id_products);
            foreach($id_products as $id){
                $product = Product::where('id', $id)->first();
                if($product == null){
                    echo redirect()->route('home');
                    die();
                }

            }
        }
    }