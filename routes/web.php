<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'index'])->name('index');

Route::get('/login', [PageController::class, 'loginPage'])->middleware('guest')->name('page.login');
Route::post('/login', [AuthController::class, 'login'])->middleware('guest')->name('post.login');

Route::get('/daftar', [PageController::class, 'registerPage'])->middleware('guest')->name('page.register');
Route::post('/daftar', [AuthController::class, 'register'])->middleware('guest')->name('post.register');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('post.logout');

Route::prefix('/dashboard')->middleware(['can:cashier', 'can:owner', 'can:stocker'])->group(function(){
    Route::get('/',[PageController::class, 'dashboardPage'])->name('page.dashboard.index');
});