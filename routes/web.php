<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'index'])->name('index');
Route::get('/login', [PageController::class, 'loginPage'])->name('page.login');
Route::post('/login', [AuthController::class, 'login'])->name('post.login');

Route::post('/logout', [AuthController::class, 'logout'])->name('post.logout');
