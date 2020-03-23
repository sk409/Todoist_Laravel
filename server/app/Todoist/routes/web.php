<?php

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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::group(["middleware" => ["auth"]], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get("/colors", "ColorsController@index")->name("colors.index");
    Route::get("/colors/findOne", "ColorsController@findOne")->name("colors.findOne");
});
