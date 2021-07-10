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



Route::get('/', "HomeController@pagina_pricipal");
Route::get('/login', "UserController@login");


/*admin*/

Route::group(['prefix'=>"admin"], function(){

    Route::resource('/estudante', "EstudanteController");
    
});

/*admin*/