<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\RegisterController;
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
Route::group(['middleware'=>'guest'], function(){
    Route::get('/register',[RegisterController::class,'index'])->name('manage.register');
    Route::post('/register',[RegisterController::class,'store'])->name('manage.register');

    Route::get('/',[LoginController::class,'index'])->name('manage.login');
    Route::post('/',[LoginController::class,'login'])->name('manage.login')->middleware('throttle:6,1');
});

Route::group(['middleware'=>'auth'], function(){
    Route::get('/dashboard',[DashboardController::class,'index'])->name('manage.dashboard');
    Route::get('/form',[DashboardController::class,'form'])->name('manage.form');
    Route::get('/table',[DashboardController::class,'table'])->name('manage.table');

    Route::get('/logout',[LoginController::class,'destroy'])->name('manage.destroy');
});

