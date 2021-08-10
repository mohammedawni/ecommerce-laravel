<?php

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;

    //Config::set('auth.defines', 'admin');
Route::get('login', [AdminController::class, 'loginpage'])->name('admin.loginpage')->withoutMiddleware('admin');
Route::post('login', [AdminController::class, 'login'])->name('admin.login')->withoutMiddleware('admin');
Route::get('/', [AdminController::class, 'home'])->name('admin.home');
Route::post('logout', [AdminController::class, 'logout'])->name('admin.logout');
Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
