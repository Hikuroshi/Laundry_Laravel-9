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

Route::resource('/dashboard/outlets', OutletController::class)->except('show')->middleware('can:outlet');
Route::resource('/dashboard/pakets', PaketController::class)->except('show')->middleware('auth');
Route::resource('/dashboard/users', UserController::class)->except('show')->middleware('auth');

Route::controller(UserController::class)->group(function () {
    Route::get('/dashboard/users/{user:username}/edit-password', 'editPassword')->middleware('auth');
    Route::put('/dashboard/users/{user:username}/edit-password', 'updatePassword');
});

Route::controller(LoginRegisterController::class)->group(function(){
    Route::get('/login', 'login')->name('login')->middleware('guest');
    Route::post('/login', 'authenticate');
    Route::get('/logout', 'logout')->middleware('auth');
    Route::get('/register', 'register')->middleware('auth');
    Route::post('/register', 'registration');
});

Route::controller(PageController::class)->group(function(){
    Route::get('/', 'index');
    Route::get('/dashboard', 'dashboard')->middleware('auth');
});