<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\RegisterController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\TemplateUiController;
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
    Route::post('/register',[RegisterController::class,'store'])->name('manage.registerForm');

    Route::get('/',[LoginController::class,'index'])->name('manage.login');
    Route::post('/',[LoginController::class,'login'])->name('manage.loginForm')->middleware('throttle:6,1');
});

Route::group(['middleware'=>'auth'], function(){

    Route::get('/dashboard',[DashboardController::class,'index'])->name('manage.dashboard');
    Route::resource('role', RoleController::class);
    Route::resource('user', UserController::class);

    Route::get('/logout',[LoginController::class,'destroy'])->name('manage.destroy');
});


Route::group(['prefix'=>'/template'], function(){
    Route::get('/default',[TemplateUiController::class,'dashboard']);
    Route::get('/charts',[TemplateUiController::class,'charts']);
    Route::get('/documentation',[TemplateUiController::class,'documentation']);
    Route::get('/form',[TemplateUiController::class,'form']);
    Route::get('/icon',[TemplateUiController::class,'icon']);
    Route::get('/table',[TemplateUiController::class,'table']);
    Route::get('/button',[TemplateUiController::class,'button']);
    Route::get('/dropdown',[TemplateUiController::class,'dropdown']);
    Route::get('/typography',[TemplateUiController::class,'typography']);
});

