<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('layout\master');
});
Route::get('/login', 'App\Http\Controllers\loginController@loginForm');
Route::post('/login', 'App\Http\Controllers\loginController@doLogin');
// Route::get('/adminHome', function () {
//     return view('homes.adminHome');
// });
