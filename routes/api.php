<?php

use Illuminate\Support\Facades\Route;

Route::get('/ping', function () {
    return response()->json(['message' => 'API aktif!']);
});

Route::prefix('v1')->group(function(){
    Route::post('/get', function(){
        return view('admin.website.index', ['title'=>'Daftar website', 'websites'=>[]]);
    })->name('admin.website');
    Route::get('/website/add', function(){
        return view('admin.website.form', ['title'=>'Tambah website', 'websites'=>[]]);
    })->name('admin.website.store');
});