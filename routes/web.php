<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {return view('home');});

Route::view('login', 'auth.login')->name('login');
Route::post('login',  [LoginController::class, 'login']);
