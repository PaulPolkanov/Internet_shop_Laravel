<?php

use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\Request;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
// Route::get('posts', function(){
//     return [1, 2];
// });
// Route::prefix('v1')->group(function(){
//     Route::post('posts-letter', function(Request $request){
//         $version = ['version' => 'v1'];
//         return $version; 
        
//     });
// });
// Route::prefix('v1')->group(function(){
//     Route::post('posts-letter', function(Request $request){
//         $version = ['version' => 'v2'];
//         return $version; 
        
//     });
// });