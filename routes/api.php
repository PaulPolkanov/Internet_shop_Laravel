<?php

use App\Http\Controllers\ApiController;
use App\Http\Resources\PageResource;
use App\Http\Resources\PagesCollection;
use App\Models\Page;
use App\Models\Role;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\Request;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\DB;
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
//Route::get('socialNet', [ApiController::class, 'socialNetworkAction']);
Route::prefix('token')->group(function(){
    Route::get('/login', [ApiController::class, 'loginAction']);
   // Route::get('/lk', [ApiController::class, 'loginAction']);
   // Route::get('/logout', [ApiController::class, 'loginAction']);
});
Route::get('/sotial-links', [ApiController::class, 'socialNetworkAction']);
Route::post('/new-products', [ApiController::class, 'newProductsAction']);
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::get('/pages', function(){
    //return new PageResource(Page::where(['aliase' => 'home'])->first());
    $pages = new PagesCollection(Page::all());
    $colection = new Collection();
    $colection->push($pages->map(function($page){
        return new PageResource($page);
    }));
    return $colection;
});
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