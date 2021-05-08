<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\shopController;
//  sda
Route::post('auth/save', [MainController::class, 'save'])->name('auth.save');
Route::post('/auth/check', [MainController::class, 'check'])->name('auth.check');
Route::get('/auth/logout', [MainController::class, 'logOut'])->name('auth.logout');

Route::group(['middleware' => ['AuthCheck']], function () {
    Route::get('/', function () {
        return view('auth.login');
    });
    Route::get('/shop/dashboard', [shopController::class, 'dashboardShop'])->name('shop.dashboard');
    Route::get('/shop/storeContent', [shopController::class, 'searchForm'])->name('shop.storeContent');
    Route::get('/shop/storeContent/{id}', [shopController::class, 'storeContent']);
    Route::post('/shop/storeContent/{id}', [shopController::class, 'doStoreContent']);
    Route::get('/shop/createContent', [shopController::class, 'createContent'])->name('shop.createContent');
    Route::post('/shop/createContent', [shopController::class, 'doCreateContent']);
    Route::get('/shop/myStorage', [shopController::class, 'myStorage'])->name('shop.myStorage');
    //
    Route::get('/shop/search', [shopController::class, 'searchContent'])->name('shop.search');
    Route::get('/admin/dashboard', [MainController::class, 'dashboardAdmin']);
    Route::get('/customer/dashboard', [MainController::class, 'dashboardCustomer'])->name('customer.dashboard');
    Route::get('/customer/home', [MainController::class, 'dashboardHome'])->name('customer.home');
    Route::get('/customer/search', [MainController::class, 'searchContent'])->name('content.search');
    Route::get('/auth/login', [MainController::class, 'login'])->name('auth.login');
    Route::get('/auth/register', [MainController::class, 'register'])->name('auth.register');
});