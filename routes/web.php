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

    Route::resource('/acoes', 'AcaoController');
    Route::resource('/mensagens', 'MensagemController');        
    Route::resource('/instituicoes', 'InstituicaoController');
    Route::resource('/acoes', 'AcaoController');
});

// // Redireciona o usuário deslogado que tentar se registrar para a página de Login
// Route::get('/user/register', function() {
//     return redirect('/user/login');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');