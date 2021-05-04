<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\shopController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|Route::post('search', 'App\Http\Controllers\studentController@search_by_id'); // хайлт хийх
// лаб-6
 */

// Route::get('/', function () {
//     return view('layout\master');
// });
// Route::get('/login', 'App\Http\Controllers\loginController@loginForm');
// Route::post('/login', 'App\Http\Controllers\loginController@doLogin');
// Route::get('/signUp', 'App\Http\Controllers\signUpController@signUp');
// Route::post('/signUp', 'App\Http\Controllers\signUpController@doSignUp');

// shop
// Route::get('/mastershop/addcontent', function () {
//     return view('shop.addContentForm');
// });
// Route::post('/mastershop/addcontent', 'App\Http\Controllers\shopController@doAddContent');




//////////////////////////////////////////////////////AUTH

Route::post('auth/save', [MainController::class, 'save'])->name('auth.save');
Route::post('/auth/check', [MainController::class, 'check'])->name('auth.check');
Route::get('/auth/logout', [MainController::class, 'logOut'])->name('auth.logout');

Route::group(['middleware' => ['AuthCheck']], function () {
    Route::get('/', function () {
        return view('auth.login');
    });
    Route::get('/shop/dashboard', [shopController::class, 'dashboardShop'])->name('shop.dashboard');
    Route::get('/shop/addContent', [shopController::class, 'searchForm'])->name('shop.addContent');
    Route::get('/shop/addContent/{id}', [shopController::class, 'addContent']);
    Route::post('/shop/addContent/{id}', [shopController::class, 'doAddContent']);
    Route::get('/shop/createContent', [shopController::class, 'createContent'])->name('shop.createContent');
    Route::post('/shop/createContent', [shopController::class, 'doCreateContent']);
    //
    Route::get('/shop/addContent', [shopController::class, 'searchForm'])->name('shop.addContent');
    Route::get('/shop/myContent', [shopController::class, 'myContent'])->name('shop.myContent');
    Route::get('/shop/search', [shopController::class, 'searchContent'])->name('shop.search');
    Route::get('/admin/dashboard', [MainController::class, 'dashboardAdmin']);
    Route::get('/customer/dashboard', [MainController::class, 'dashboardCustomer'])->name('customer.dashboard');
    Route::get('/customer/search', [MainController::class, 'searchContent'])->name('content.search');
    Route::get('/auth/login', [MainController::class, 'login'])->name('auth.login');
    Route::get('/auth/register', [MainController::class, 'register'])->name('auth.register');
});
