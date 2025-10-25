<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Settings\WesiteController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\Settings\WebsiteController;
use App\Http\Controllers\Admin\Settings\TokenController;

use App\Http\Controllers\user\HomeController;
use App\Http\Controllers\user\ReferalConntroller;
use App\Http\Controllers\user\ProfileController;
use App\Http\Controllers\user\WithdrawController;


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

// Admin dashboard routes
Route::prefix('admin')->middleware('role:admin')->group(function () {
    // start create logick 
    Route::prefix('setting')->group(function(){
        Route::prefix('website')->group(function() {
            Route::get('/', [WebsiteController::class, 'index'])->name('admin.website');
            // list webstite
            Route::get('/produk/sync/{id}', [WebsiteController::class, 'syncProduk'])->name('admin.website.produk.sync');
            Route::get('/list-website', [WebsiteController::class, 'listWebsite'])->name('admin.website.list');
            Route::get('/produk/{id}', [WebsiteController::class, 'listProduk'])->name('admin.website.list.detail');
            Route::get('/produk/edit/{id}', [WebsiteController::class, 'editProduk'])->name('admin.website.produk.edit');
            Route::delete('/produk/delete/{id}', [WebsiteController::class, 'deleteProduk'])->name('admin.website.produk.delete');
            // end website
            Route::get('/{id}', [WebsiteController::class, 'detail'])->name('admin.website.detail');
            Route::get('/add', [WebsiteController::class, 'showAdd'])->name('admin.website.store');
            Route::post('/',  [WebsiteController::class, 'store'])->name('website.add');
            Route::put('/',  [WebsiteController::class, 'update'])->name('website.edit');
            Route::delete('/{id}',  [WebsiteController::class, 'destroy'])->name('website.delete');
            Route::get('/edit/{id}', [WebsiteController::class, 'showEdit'])->name('admin.website.edit');

            // new route for sync to source
            Route::post('/check-activation', [TokenController::class, 'checkActivation'])->name('admin.website.check_activation');
            Route::delete('/token/{id}', [TokenController::class, 'destroyToken'])->name('admin.token.delete');
            Route::post('/token/generate', [TokenController::class, 'generateToken'])->name('admin.token.generate');
            

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


use App\Http\Controllers\user\ProdukController;
// User dashboard routes
Route::prefix('user')->middleware('role:affiliator')->group(function () {
    Route::get('/produk/{id_web}', [ProdukController::class, 'index'])->name('user.website.produk');
    Route::get('/dashboard', [HomeController::class, 'index'])->name('user.dashboard');
    Route::get('/profile', [ProfileController::class, 'index'])->name('user.profile');
    Route::prefix('withdraw')->group(function () {
        Route::get('/', [WithdrawController::class, 'index'])->name('user.withdraw');
        Route::get('/history', [WithdrawController::class, 'history'])->name('user.withdraw.history');
        Route::get('/form', [WithdrawController::class, 'form'])->name('user.withdraw.form');
    });
    Route::get('/my-produk', [ProdukController::class, 'myProduk'])->name('user.website.myproduk');
    Route::get('/referal', [ReferalConntroller::class, 'index'])->name('user.referal');
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
