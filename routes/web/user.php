<?php

Route::middleware(['user'])->group(function() {
    Route::get('user/profile', function() {
        return view('user.profile');
    })->name('user.profile');
});