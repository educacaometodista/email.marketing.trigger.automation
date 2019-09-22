<?php

Route::prefix('superadmin')->name('superadmin.')->namespace('Superadmin')->group(function () {
    Auth::routes();
    Route::middleware('auth:superadmin')->group(function () {
        Route::get('/', 'HomeController@index')->name('/');
        Route::get('home', 'HomeController@home')->name('home');
        Route::get('register', 'HomeController@index');

    });

    Route::get('/password/email', function () {
        return redirect('superadmin/login');
    });
});