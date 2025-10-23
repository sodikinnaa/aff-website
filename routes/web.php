<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Settings\WesiteController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\Settings\WebsiteController;
Route::get('/', function () {
    return view('welcome');
});

// auth start to code 
Route::get('/login', [AuthController::class, 'showLogin'])->middleware('auth.login')->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::get('/register', function(){
    return view('auth/register');
});
Route::post('/register', function(){
    return view('auth/register');
})->name('register.submit');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
// end auth code 

// admin dashboard 
// Admin dashboard routes
Route::prefix('admin')->middleware('role:admin')->group(function () {
    // start create logick 
    Route::prefix('setting')->group(function(){
        Route::prefix('website')->group(function() {
            Route::get('/', [WebsiteController::class, 'index'])->name('admin.website');
            Route::get('/add', [WebsiteController::class, 'showAdd'])->name('admin.website.store');
        });
    });

    // end settings route

    Route::get('/dashboard', function() {
        return view('admin.index', ['title' => 'Dashboard Admin']);
    })->name('admin.dashboard');
    Route::prefix('/users')->group(function () {
        Route::get('/', function() {
            return view('admin.user.index', ['title' => 'Daftar User', 'users' => []]);
        })->name('admin.users');
        Route::post('/', function() {
            return redirect()->route('admin.users');
        })->name('admin.users.store');
        Route::put('/', function() {
            return redirect()->route('admin.users');
        })->name('admin.users.update');
        Route::get('/form', function() {
            return view('admin.user.form', ['title' => 'Tambah User', 'users'=>[]]);
        })->name('users.form');

        // roles
        Route::prefix('roles')->group(function () {
            Route::get('/', function() {
                return view('admin.user.admin.index', ['title' => 'Daftar Admin', 'users' => []]);
            })->name('roles.users');
            Route::post('/', function() {
                return redirect()->route('roles.users');
            })->name('roles.users.store');
            Route::put('/', function() {
                return redirect()->route('roles.users');
            })->name('roles.users.update');
            Route::get('/form', function() {
                return view('admin.user.admin.form', ['title' => 'Tambah User', 'users'=>[]]);
            })->name('roles.form');
        });   

    });
    // product route 
    Route::prefix('products')->group(function(){
        Route::get('/', function(){
            return view('admin.products.index', ['title'=>'Daftar Product', 'products'=>[]]);
        })->name('admin.products');
        Route::get('/{id}', function($id){
            // disini slug_produk sudah bisa digunakan jika ingin detail produk
            return view('admin.products.detail', ['title'=>'Detail Product', 'userCourses'=>[]]);
        })->name('admin.products.detail');
    });
    Route::get('/reports', function() {
        return 'Admin Reports';
    })->name('admin.reports');

    
});

// User dashboard routes
Route::prefix('user')->middleware('role:affiliator')->group(function () {
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

// mitra dashboard 
Route::prefix('mitra')->middleware('role:mitra')->group(function (){
    Route::get('/dashboard', function() {
        return 'User Dashboard';
    })->name('mitra.dashboard');
    Route::get('/profile', function() {
        return 'User Profile';
    })->name('mitra.profile');
    Route::get('/rewards', function() {
        return 'User Rewards';
    })->name('mitra.rewards');
});
