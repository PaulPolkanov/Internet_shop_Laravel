<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Middleware\CheckOrder;
use App\Http\Middleware\Login;
use App\Http\Middleware\LoginLk;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [IndexController::class, 'indexAction'])->name('home');
Route::get('/product/{id}', [IndexController::class, 'productAction'], function($id){
    return $id;
});
Route::get('/category/{id}', [IndexController::class, 'categoryAction'], function($id){
    return $id;
});
//Route::get('/checkout', [IndexController::class, 'checkoutAction']);
Route::get('/resaltserch', [IndexController::class, 'searchAction']);
Route::get('/form', [IndexController::class, 'formAction']);
Route::post('/mailer', [IndexController::class, 'mailerAction']);
Route::post('/add-card', [IndexController::class, 'addCardAction']);
Route::get('/card', [IndexController::class, 'cardAction'])->name('card');
// Route::get('/category/{status}', [IndexController::class, 'modeShowProductAction'], function($status){
//     return $status;
// });

Route::controller( ClientController::class )->group(function(){
    Route::middleware([CheckOrder::class])->group(function () {
        Route::post('/created-order', 'createOrderAction')->name('created-order');
    });
    Route::get('/checkout', [ClientController::class, 'checkoutAction'])->name('check');
    Route::post('/lk-login', 'loginAction')->name('lk-login');
    Route::middleware([LoginLk::class])->group(function () {
        Route::get('/lk-logout', 'logoutAction')->name('lk-logout');

        Route::get('/lk', 'IndexAction')->name('lk');
    });
});



// Route::get('/card', [ShopController::class, 'cardAction'])->name('card');

// Route::post('/shop', [ShopController::class, 'shopAction']);


Route::middleware([Login::class])->group(function () {
    Route::get('/admin', [AdminController::class, 'indexAction'])->name('dashboard');

    Route::get('/admin/products', [AdminController::class, 'productsShowAction'])->name('adminProducts');
    Route::get('/admin/addProduct', [AdminController::class, 'productAddAction'])->name('adminAddProduct');

    Route::get('/admin/category', [AdminController::class, 'categoryShowAction'])->name('adminCategory');
    Route::post('/admin/addCategory', [AdminController::class, 'categoryAddAction']);
    Route::post('/admin/deleteCategory', [AdminController::class, 'categoryDeleteAction']);


    Route::post('/admin/addingProduct', [AdminController::class, 'productAddPostAction']);
    Route::get('/admin/editCategory/{id}', [AdminController::class, 'categoryEditAction'], function($id){
        return $id;
    });
    Route::post('/admin/changeCategory', [AdminController::class, 'categoryChangeAction']);
});

Route::get('/admin/login', [AdminController::class, 'loginAction'])->name('adminlogin');
Route::post('/admin/auth', [AdminController::class, 'authAction']);
Route::get('/admin/loguot', [AdminController::class, 'logoutAction'])->middleware('logout');
Route::get('/admin/forgotPassword', [AdminController::class, 'forgotPassAction'])->name('forgotPass');
Route::post('/admin/forgotPasswordRequest', [AdminController::class, 'forgotPassReqAction']);
//Route::get('/admin/resetPassword', [AdminController::class, 'resPassAction'])->name('resPass');
Route::get('/admin/resetPassword/{token}', [AdminController::class, 'resPassAction'], function($token){
    return $token;
});
Route::post('/admin/resetPasswordRequest', [AdminController::class, 'resPassReqAction']);
