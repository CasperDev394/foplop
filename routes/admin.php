<?php

use Illuminate\Support\Facades\Route;

Route::prefix('profile')->group(function () {
    Route::view('/', 'admin.profile');

});
