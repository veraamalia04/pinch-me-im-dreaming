<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'index'])->name('index');

Route::get('/login', [PageController::class, 'loginPage'])->middleware('guest')->name('page.login');
Route::post('/login', [AuthController::class, 'login'])->middleware('guest')->name('post.login');

Route::get('/daftar', [PageController::class, 'registerPage'])->middleware('guest')->name('page.register');
Route::post('/daftar', [AuthController::class, 'register'])->middleware('guest')->name('post.register');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('post.logout');

Route::prefix('/dashboard')->middleware(['can:cashier', 'can:owner', 'can:stocker'])->group(function(){
    Route::get('/',[PageController::class, 'dashboardPage'])->name('page.dashboard.index');

    Route::prefix('/cashier')->middleware('can:cashier')->group(function(){
        Route::get('/', [PageController::class, 'cashierIndexPage'])->name('page.dashboard.cashier.index');
    });
    Route::prefix('/stocker')->middleware('can:stocker')->group(function(){
        Route::get('/', [PageController::class, 'stockerIndexPage'])->name('page.dashboard.stocker.index');

        Route::post('/add_menu', [ProductController::class, 'store'])->name('post.product.store');
        Route::put('/update_product/{product}', [ProductController::class, 'update'])->name('put.product.update');
        Route::post('/update_harga/{product}', [ProductController::class, 'updateHarga'])->name('post.product.update_harga');
        Route::delete('/delete_product/{product}', [ProductController::class, 'deleteProduct'])->name('delete.product.delete');
    });
    Route::prefix('/owner')->middleware('can:owner')->group(function(){
        Route::get('/', [PageController::class, 'ownerIndexPage'])->name('page.dashboard.owner.index');
    });
});

