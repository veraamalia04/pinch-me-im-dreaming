<?php

use Illuminate\Support\Facades\Route;

Route::get('/hc', function(){
    return response()->json(['vera' => 'zayn']);
});