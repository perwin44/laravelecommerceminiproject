<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/redirect',[HomeController::class,'redirect']);

Route::get('/',[HomeController::class,'index']);

Route::get('/product',[AdminController::class,'product']);
Route::post('/upload_product',[AdminController::class,'upload_product']);
Route::get('/show_product',[AdminController::class,'show_product']);
Route::get('/delete_product/{id}',[AdminController::class,'delete_product']);
Route::get('/update_view/{id}',[AdminController::class,'update_view']);
Route::post('/update_product/{id}',[AdminController::class,'update_product']);

Route::get('/search',[HomeController::class,'search']);
Route::post('/add_cart/{id}',[HomeController::class,'add_cart']);
Route::get('/show_cart',[HomeController::class,'show_cart']);
Route::get('/delete/{id}',[HomeController::class,'delete']);
Route::post('/order',[HomeController::class,'order']);

Route::get('/show_order',[AdminController::class,'show_order']);
Route::get('/update_status/{id}',[AdminController::class,'update_status']);










Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
