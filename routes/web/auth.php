<?php

use App\Http\Controllers\AuthController;

Route::controller(AuthController::class)->group(function() {
    Route::get('/', 'home')->name('home');
    Route::get('/login/signin', 'login')->name('login.signin');
    Route::post('login', 'logincheck')->name('login.check');
    Route::post('/logout', 'destroy')->name('logout');
});