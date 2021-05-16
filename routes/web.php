<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\customerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\shopController;

//  sda
Route::post('auth/save', [MainController::class, 'save'])->name('auth.save');
Route::post('/auth/check', [MainController::class, 'check'])->name('auth.check');
Route::get('/auth/logout', [MainController::class, 'logOut'])->name('auth.logout');

Route::group(['middleware' => ['AuthCheck']], function () {
    Route::get('/', function () {
        return view('auth.login');
    });

    // * -----------------------------------<<<<Shop>>>>------------------------------------
    Route::get('/shop/home', [shopController::class, 'shopHome'])->name('shop.home');
    Route::get('/shop/storeContent', [shopController::class, 'searchForm'])->name('shop.storeContent');
    Route::get('/shop/storeContent/{id}', [shopController::class, 'storeContent']);
    Route::post('/shop/storeContent/{id}', [shopController::class, 'doStoreContent']);
    Route::get('/shop/createContent', [shopController::class, 'createContent'])->name('shop.createContent');
    Route::post('/shop/createContent', [shopController::class, 'doCreateContent']);
    Route::get('/shop/myStorage', [shopController::class, 'myStorage'])->name('shop.myStorage');
    Route::get('/shop/search', [shopController::class, 'searchContent'])->name('shop.search');
    Route::get('/shop/givecontent', [shopController::class, 'giveContent'])->name('shop.giveContent');
    Route::post('/shop/givecontent', [shopController::class, 'doGiveContent'])->name('shop.giveContent');
    Route::get('/shop/recievecontent', [shopController::class, 'recieveContent'])->name('shop.recieveContent');
    Route::post('/shop/recievecontent', [shopController::class, 'doRecieveContent'])->name('shop.recieveContent');
    Route::get('/shop/myorder', [shopController::class, 'myOrder'])->name('shop.myOrder');
    Route::get('/shop/myorder/{orderId}', [shopController::class, 'extendOrder'])->name('shop.extendOrder');
    // todo) => send email
    Route::get('/shop/email',  'App\Http\Controllers\EmailController@create');
    Route::post('/shop/email', 'App\Http\Controllers\EmailController@sendEmail')->name('shop/email');

    // * -----------------------------------<<<<Customer>>>>------------------------------------
    Route::get('/customer/home', [customerController::class, 'customerHome'])->name('customer.home');
    Route::get('/customer/myorder', [customerController::class, 'myOrder'])->name('customer.myOrder');
    Route::get('/customer/search', [customerController::class, 'searchContent'])->name('content.search');
    Route::get('/customer/content/{id}', [customerController::class, 'getContent']);
    Route::get('/customer/content/{id}/orderContent', [customerController::class, 'orderContent']);
    Route::post('/customer/content/{id}/orderContent', [OrderController::class, 'store'])->name('customer.store');
    Route::get('/customer/myorder/{orderId}', [customerController::class, 'extendRequest']);

    // * -----------------------------------<<<<Admin>>>>------------------------------------
    Route::get('/admin/home', [adminController::class, 'adminHome'])->name('admin.home');
    Route::get('/admin/shops', [adminController::class, 'shopAccounts'])->name('admin.shops');
    Route::get('/admin/customers', [adminController::class, 'customerAccounts'])->name('admin.customers');
    // * -------------------------------<<<<Authentication>>>>---------------------------------
    Route::get('/auth/login', [MainController::class, 'login'])->name('auth.login');
    Route::get('/auth/register', [MainController::class, 'register'])->name('auth.register');
    Route::get('/admin/home', [MainController::class, 'homeAdmin']);
});