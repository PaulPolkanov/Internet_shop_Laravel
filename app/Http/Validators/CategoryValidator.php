<?php
namespace App\Http\Validators;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CategoryValidator{
    public static function categoryAdd($request){
        return Validator::make($request->all(), [
            'name' => 'required|min:2|max:100',
            'description' => 'required|max:1000',
        ],
        [
            'name.required' => 'Category\'s name importent for fill',
            'description.required' => 'Category\'s description importent for fill',
            'name.min.2' => 'Category\'s name must be more 1 letter',
            'name.max:100' => 'Category\'s name must be less 100 letters',
            'description.max:1000' => 'Category\'s description must be less 1000 sumbols',
        ]
    );
    }
    public static function categoryDelete($request){
        return Validator::make($request->all(), [
            'category_id' => 'required|integer',
        ],
        [
            'category_id.required' => 'Error',
            'category_id.integer' => 'Error',
            
        ]
        );
   }
}
