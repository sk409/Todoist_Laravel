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
    Route::get("/projects/findByIdSuperficial", "ProjectsController@findByIdSuperficial")->name("projects.findByIdSuperficial");
    Route::get("/projects/findByUserIdSuperficial", "ProjectsController@findByUserIdSuperficial")->name("projects.findByUserIdSuperficial");
    Route::post("/projects", "ProjectsController@store")->name("projects.store");
    Route::post("/todos", "TodosController@store")->name("todos.store");
    Route::put("/todos/{id}", "TodosController@update")->name("todos.update");
    Route::post("/todoSections", "TodoSectionsController@store")->name("todoSections.store");
});
