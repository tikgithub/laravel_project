<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Session;

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

Route::get('/login', function () {
    return view('login');
});


Route::post("/login",[UserController::class,'login']);
Route::get("/",[ProductController::class,'index']);
Route::get("detail/{id}",[ProductController::class,'detail']);
Route::get("search",[ProductController::class,'search']);
Route::post("add_to_cart",[ProductController::class,'addToCart']);
Route::get('logout',function(){
    Session::forget('user');
    return redirect('/login');
});
Route::get('cartlist',[ProductController::class,'cartList']);
Route::get('cartremove/{id}',[ProductController::class,'removecart']);
Route::get('cartremoveall',[ProductController::class,'removeAllCart']);
Route::get('ordernow',[ProductController::class,'orderNow']);
Route::post('payorder',[ProductController::class,'payOrder']);
Route::get('myorders',[ProductController::class,'myOrders']);
Route::view('register','register');
Route::post('register',[UserController::class,'register']);