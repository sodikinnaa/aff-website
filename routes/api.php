<?php

use Illuminate\Support\Facades\Route;

Route::get('/ping', function () {
    return response()->json(['message' => 'API aktif!']);
});

Route::prefix('v1')->group(function(){
    Route::post('/webhooks', function(){
        return view('admin.website.index', ['title'=>'Daftar website', 'websites'=>[]]);
    })->name('admin.transaction');
});