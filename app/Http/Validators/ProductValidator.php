<?php
namespace App\Http\Validators;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProductValidator{
    public static function productAdd($request){
        return Validator::make($request->all(),
            [
                "name" => "required",
                "count" => "required",
                "price" => "required",
                "old_price" => "required",
                "status" => "required",
                "tags" => 'required',
                "category" => "required",
                'img' => 'required|mimes:jpeg,jpg,png,pdf|max:10000',
            ], 
            [
                'img.required' => 'Error',
            ]
        );
    }
//     public static function categoryDelete($request){
//         return Validator::make($request->all(), [
//             'category_id' => 'required|integer',
//         ],
//         [
//             'category_id.required' => 'Error',
//             'category_id.integer' => 'Error',
            
//         ]
//         );
//    }
}
