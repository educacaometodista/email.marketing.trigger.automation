<?php


Route::prefix('user')->name('user.')->namespace('User')->group(function () {
    Auth::routes();
    Route::middleware('auth:user')->group(function () {
        Route::get('/', 'HomeController@home')->name('/');
        Route::get('home', 'HomeController@index')->name('home');
    });
    Route::get('edit/{id}', 'Auth\EditController@edit')->name('edit');
    Route::post('update/{id}', 'Auth\EditController@update')->name('update');

    Route::get('/password/email', function () {
        return redirect('user/login');
    });
});