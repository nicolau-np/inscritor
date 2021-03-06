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
Route::post('/logar', "UserController@logar")->name('logar');
Route::get('/logout', "UserController@logout")->name('logout');


/*admin*/

Route::group(['prefix'=>"admin", 'middleware'=>"auth"], function(){
    Route::get('/', "HomeController@index")->name('admin');

    Route::resource('/estudante', "EstudanteController")->middleware('user');

    Route::resource('/ano_lectivo', "AnoLectivoController")->middleware('master');

    Route::resource('/cursos', "CursoController")->middleware('master');

    Route::resource('/escolas', "EscolaController")->middleware('master');

    Route::group(['prefix' =>"escolas", 'middleware'=>"master"], function(){
        Route::get('/users/{id_instituicao}', "UserController@users");
        Route::put('/users/store/{id_instituicao}', "UserController@store");

        Route::get('/condicoes/{id_instituicao}', "CondicaoController@create");
        Route::put('/condicoes/store/{id_instituicao}', "CondicaoController@update");
    });

    Route::group(['prefix'=>"usuarios", 'middleware'=>"admin"], function(){
        Route::get('/', "UserController@index");
        Route::get('/create', "UserController@create");
        Route::post('/store', "UserController@storeE");
    });

    Route::group(['prefix' =>"profile"], function(){
        Route::get('/', "UserController@profile");
        Route::post('/update', "UserController@update");
    });

    Route::group(['prefix' =>"estatisticas", 'middleware'=>"admin"], function(){
        Route::get('/lista', "EstatisticaController@index");
        Route::post('/getList', "EstatisticaController@getList");
    });


    Route::get('/sobre', "HomeController@sobre");

});

/*admin*/
