<?php


Route::prefix('user')->name('user.')->namespace('User')->group(function () {
    Auth::routes();
    Route::middleware('auth:user')->group(function () {
        Route::get('/', 'HomeController@home')->name('/');
        Route::get('home', 'HomeController@index')->name('home');
    });
});