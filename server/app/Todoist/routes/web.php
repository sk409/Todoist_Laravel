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
    Route::get('/home', 'HomeController@home')->name('home');
    Route::get("/colors", "ColorsController@index")->name("colors.index");
    Route::get("/colors/findOne", "ColorsController@findOne")->name("colors.findOne");
    Route::get("/projects/user", "ProjectsController@user")->name("projects.user");
    Route::post("/projects", "ProjectsController@store")->name("projects.store");
    Route::post("/todos", "TodosController@store")->name("todos.store");
    Route::post("/todoSections", "TodoSectionsController@store")->name("todoSections.store");
});
