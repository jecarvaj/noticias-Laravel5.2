<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*Route::get('/', function () {
    return view('home');
});
*/

Route::get('/', [
    'uses'=>'FrontController@index',
    'as'=>'home'
]);
Route::get('/ver/{id}', [
    'uses'=>'FrontController@show',
    'as'=>'ver'
]);
Route::auth();

Route::get('/home', 'HomeController@index'); //aqui tengo que listar las noticias

Route::group(['prefix'=>'admin', 'middleware'=>'auth'], function(){
    Route::resource('/', 'AdminController@index');
    Route::resource('index', 'AdminController@index');
    Route::resource('create', 'NoticiasController');
    Route::get('/{id}/destroy',[
        'uses'=>'NoticiasController@destroy',
        'as'=>'admin.create.destroy'

    ]);
});

