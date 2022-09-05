<?php
namespace App\Http\Validators;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class forgotPasswordValidator{
    public static function checkMail($request){
        return Validator::make($request->all(), [
            'mail' => 'required|email:rfc,dns'
        ],
        [
            'mail.required' => 'Error!',
            'mail.email:rfc,dns' => 'Error!',
        ]);
    }
    public static function checkPassword($request){
        return Validator::make($request->all(), [
            'id' => 'required',
            'password' => 'required|min:2|max:20',
            'remember_password' => 'required|same:password',
        ],
        [
            'remember_password.same:password' => "Error! The confirmation password must match the new password",
            'id.required' => 'Error! User not exist.',
            'password.min:2' => "Password must be more 2 symbols",
            'password.max:8' => "Password must be less 20 symbols"

        ]
        );
    }

}