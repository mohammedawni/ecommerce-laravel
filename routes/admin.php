<?php

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;

Route::group(['namespace'=>'Admin'],function(){
    //Config::set('auth.defines', 'admin');
    Route::get('login', [AdminController::class, 'loginpage'])->name('admin.loginpage');
    Route::post('login', [AdminController::class, 'login'])->name('admin.login');
    Route::group(['middleware'=>['admin']], function ()
    {
        Route::get('logout', [AdminController::class, 'logout'])->name('admin.logout');
        Route::get('/', [AdminController::class, 'home'])->name('admin.home');
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    });
});