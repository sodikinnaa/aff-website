<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', function(){
    return view('auth/login');
});
Route::post('/login', function(){
    return request()->all();
})->name('login.submit');
Route::get('/register', function(){
    return view('auth/register');
});
Route::post('/register', function(){
    return view('auth/register');
})->name('register.submit');

// admin dashboard 
// Admin dashboard routes
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', function() {
        return view('admin.index');
    })->name('admin.dashboard');
    Route::get('/users', function() {
        return 'Admin User Management';
    })->name('admin.users');
    Route::get('/reports', function() {
        return 'Admin Reports';
    })->name('admin.reports');
});

// User dashboard routes
Route::prefix('user')->group(function () {
    Route::get('/dashboard', function() {
        return 'User Dashboard';
    })->name('user.dashboard');
    Route::get('/profile', function() {
        return 'User Profile';
    })->name('user.profile');
    Route::get('/rewards', function() {
        return 'User Rewards';
    })->name('user.rewards');
});

