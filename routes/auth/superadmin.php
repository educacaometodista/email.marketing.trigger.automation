<?php

Route::prefix('superadmin')->name('superadmin.')->namespace('Superadmin')->group(function () {
    Auth::routes();
    Route::middleware('auth:superadmin')->group(function () {
        Route::get('/', 'HomeController@index')->name('/');
        Route::get('home', 'HomeController@index')->name('home');
        Route::get('register', 'HomeController@index');

    });
    Route::get('edit/{id}', 'Auth\EditController@edit')->name('edit');
    Route::post('update/{id}', 'Auth\EditController@update')->name('update');

    Route::get('/password/reset', function () {
        return redirect('superadmin/login');
    });
});