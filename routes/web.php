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
    return view('welcome');
});

Auth::routes();

require 'auth/user.php';
require 'auth/admin.php';
require 'auth/superadmin.php';


Route::prefix('admin')->name('admin.')->group(function () {
    Route::prefix('listas')->name('listas.')->namespace('Emkt')->group(function () {
        Route::resource('/importar', 'EmktController');
    });
    Route::prefix('instituicoes')->name('instituicoes.')->group(function () {
        Route::resource('/instituicoes', 'InstituicaoController');
    });
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');