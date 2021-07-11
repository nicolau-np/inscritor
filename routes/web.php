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



Route::get('/', "HomeController@pagina_pricipal")->name('home');
Route::get('/login', "UserController@login")->name('login');
Route::get('/logar', "UserController@logar")->name('logar');


/*admin*/

Route::group(['prefix'=>"admin"], function(){
    Route::get('/', "HomeController@index")->name('admin');
    
    Route::resource('/estudante', "EstudanteController");

});

/*admin*/