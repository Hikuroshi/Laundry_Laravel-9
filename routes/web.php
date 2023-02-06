<?php

use App\Http\Controllers\LoginRegisterController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

// Route::resource('/dashboard/outlets', OutletController::class);
Route::resource('/dashboard/pakets', PaketController::class);
Route::resource('/dashboard/users', UserController::class);
Route::resource('/dashboard/outlets', OutletController::class);

Route::controller(LoginRegisterController::class)->group(function(){
    Route::get('/login', 'login');
    Route::post('/login', 'authenticate');
    Route::get('/logout', 'logout');
    Route::get('/register', 'register');
    Route::post('/register', 'registration');
});

Route::controller(PageController::class)->group(function(){
    Route::get('/dashboard', 'dashboard');
});