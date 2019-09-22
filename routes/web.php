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

Route::get('/', function () {
    return redirect('/user/login');
});

Auth::routes();

require 'auth/user.php';
require 'auth/admin.php';
require 'auth/superadmin.php';


Route::prefix('admin')->name('admin.')->namespace('Emkt')->group(function () {

    Route::prefix('listas')->name('listas.')->group(function () {
        Route::get('create', 'ListaController@create')->name('create');
        Route::post('store', 'ListaController@store')->name('store');
    });

    Route::prefix('acoes')->name('acoes.')->group(function () {
        Route::get('/', 'AcaoController@index')->name('index');
        Route::get('/create', 'AcaoController@create')->name('create');
        Route::post('/store', 'AcaoController@store')->name('store');
        //Route::get('/{id}', 'AcaoController@show')->name('show');
    });

    Route::prefix('mensagens')->name('mensagens.')->group(function () {
        Route::get('/', 'MensagemController@index')->name('index');
        Route::get('/create', 'MensagemController@create')->name('create');
        Route::get('/{id}/edit', 'MensagemController@edit')->name('edit');
        Route::post('/store', 'MensagemController@store')->name('store');
        Route::put('/{id}', 'MensagemController@update')->name('update');
        Route::post('/destroy/{id}', 'MensagemController@destroy')->name('destroy');
    });

    Route::prefix('instituicoes')->name('instituicoes.')->group(function () {
        Route::get('/', 'InstituicaoController@index')->name('index');
        Route::get('/create', 'InstituicaoController@create')->name('create');
        Route::get('/{id}/edit', 'InstituicaoController@edit')->name('edit');
        Route::post('/store', 'InstituicaoController@store')->name('store');
        Route::put('/{id}', 'InstituicaoController@update')->name('update');
        Route::post('/destroy/{id}', 'InstituicaoController@destroy')->name('destroy');
    });
});

// // Redireciona o usuário deslogado que tentar se registrar para a página de Login
// Route::get('/user/register', function() {
//     return redirect('/user/login');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');