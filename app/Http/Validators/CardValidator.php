<?php
namespace App\Http\Validators;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CardValidator{
    public static function cardAdd($request){
        return Validator::make($request->all(),[
            'id_product' => 'required',
        ],[
            'id_product.required' => 'Error! Product not exist.'
        ]);
    }
}