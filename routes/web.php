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
|
*/

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::group([
    'prefix'=>'user',
    'as'=>'user.',
    'namespace'=>'User',
    'middleware'=>['web', 'auth', 'user']
], function () {
    Route::get('/', 'UserController@index')->name('index');
});

Route::group([
    'prefix'=>'admin',
    'as'=>'admin.',
    'namespace'=>'Admin',
    'middleware'=>['web', 'auth', 'admin']
], function () {
    Route::get('/', 'AdminController@index')->name('index');

    Route::resource("products","ProductController");
});

