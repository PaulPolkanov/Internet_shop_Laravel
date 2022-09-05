<?php

use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\Request;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;


Route::post('posts-letter', function(Request $request){
    $version = ['version' => 'v2'];
    return $version; 
        
});