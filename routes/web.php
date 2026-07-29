<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BoxController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'index'])->name('index');

Route::get('/login', [PageController::class, 'loginPage'])->middleware('guest')->name('page.login');
Route::post('/login', [AuthController::class, 'login'])->middleware('guest')->name('post.login');

Route::get('/daftar', [PageController::class, 'registerPage'])->middleware('guest')->name('page.register');
Route::post('/daftar', [AuthController::class, 'register'])->middleware('guest')->name('post.register');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('post.logout');

Route::get('/myprofile', [PageController::class, 'myProfile'])->name('page.myprofile');



Route::prefix('/alamat')->middleware('auth')->group(function(){
    Route::delete('/{user}/{address}', [AddressController::class, 'deleteAddress'])->name('delete.address');
    Route::put('/{address}/is_active', [AddressController::class, 'changeActiveAddress'])->name('put.address.change_active_address');
    Route::get('/{address}/edit', [PageController::class, 'pageEditAddress'])->name('page.address.edit');
    Route::get('/{user:username}', [PageController::class, 'pageCreateAddress'])->name('page.address.create');
    Route::post('/{user}', [AddressController::class, 'storeAddress'])->name('post.address.store');
    Route::put('/{address}', [AddressController::class, 'updateAddress'])->name('put.address.update');

});


Route::get('/menu', [PageController::class, 'menuPage'])->name('page.menu');

Route::prefix('box')->group(function(){
    Route::post('/{detail}/kurang', [BoxController::class, 'subtractOneFromBox'])->name('post.box.subtract_one_from_box');
    Route::post('/{detail}/tambah', [BoxController::class, 'increaseOneToBox'])->name('post.box.increase_one_to_box');
    Route::delete('/{detail}', [BoxController::class, 'deleteBoxDetail'])->name('delete.box.delete_box_detail');
    Route::get('/', [PageController::class, 'boxPage'])->name('page.box.index');
    Route::post('/', [BoxController::class, 'storeToBox'])->name('post.box.store_to_box');
});

Route::prefix('/order')->group(function(){
    Route::get('/', [PageController::class, 'orderPage'])->name('page.order.index');
    Route::post('/', [OrderController::class, 'transferBoxToOrder'])->name('post.order.transfer_box_to_order');
    Route::put('/{order}/menandai_selesai', [OrderController::class, 'menandaiSelesai'])->name('put.order.tandai_selesai');
    Route::get('/{order}', [PageController::class, 'orderDetailPage'])->name('page.order.show');
});

Route::prefix('/dashboard')->middleware(['can:cashier', 'can:owner', 'can:stocker'])->group(function(){
    Route::get('/',[PageController::class, 'dashboardPage'])->name('page.dashboard.index');

    Route::prefix('/cashier')->middleware('can:cashier')->group(function(){
        Route::get('/', [PageController::class, 'cashierIndexPage'])->name('page.dashboard.cashier.index');

        Route::prefix('/order')->group(function(){
            Route::put('/{order}/menandai_diproses', [OrderController::class, 'menandaiDiproses'])->name('put.dashboard.kasir.order.tandai_diproses');
            Route::put('/{order}/mengirim_order', [OrderController::class, 'mengirimOrder'])->name('put.dashboard.kasir.order.tandai_dikirim');
        });
    });
    Route::prefix('/stocker')->middleware('can:stocker')->group(function(){
        Route::get('/', [PageController::class, 'stockerIndexPage'])->name('page.dashboard.stocker.index');
        Route::get('/tambah_menu', [PageController::class, 'createProductPage'])->name('page.product.create');
        Route::post('/add_menu', [ProductController::class, 'store'])->name('post.product.store');
        Route::get('/edit/{product}', [PageController::class, 'editProductPage'])->name('page.product.edit');

        Route::put('/update_product/{product}', [ProductController::class, 'updateProduct'])->name('put.product.update');
        Route::post('/update_harga/{product}', [ProductController::class, 'updateHarga'])->name('post.product.update_harga');
        Route::delete('/delete_product/{product}', [ProductController::class, 'deleteProduct'])->name('delete.product.delete');
    });
    Route::prefix('/owner')->middleware('can:owner')->group(function(){
        Route::get('/', [PageController::class, 'ownerIndexPage'])->name('page.dashboard.owner.index');
    });

    


});

