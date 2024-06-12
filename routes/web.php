<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {return view('home');});

Route::view('register', 'auth.register')->name('register');
Route::view('login', 'auth.login')->name('login');
Route::post('login',  [LoginController::class, 'login']);


Route::view('slots', 'slots.index')->name('slots');


Route::view('favorites', 'slots.favorites')->name('favorites');

//categories
Route::view('categories', 'slots.categories')->name('categories');

//for-broker
Route::view('for-broker', 'for-broker')->name('for-broker');
