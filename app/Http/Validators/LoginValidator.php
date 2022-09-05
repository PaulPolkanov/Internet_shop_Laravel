<?php
namespace App\Http\Validators;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class LoginValidator{
    public static function logIn($request){
        return Validator::make($request->all(), [
            'name' => 'required|min:2',
            'password' => 'required|min:2',
            'email' => 'required|email:rfc'
        ]);
    }
}