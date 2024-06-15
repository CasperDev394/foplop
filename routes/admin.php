<?php

use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\CourtsController;
use App\Http\Controllers\Admin\DebtorsController;
use App\Http\Controllers\Admin\DirectionsController;
use App\Http\Controllers\Admin\SlotsController;
use Illuminate\Support\Facades\Route;

Route::prefix('profile')->group(function () {
    Route::view('/', 'admin.profile');

});

Route::prefix('slots')->group(function () {
    Route::view('/', 'admin.slots.list');
    Route::get('getList', [SlotsController::class, 'getList']);

    Route::view('create', 'admin.slots.item');
    Route::post('create', [SlotsController::class, 'create']);

    Route::get('{slot:name_slug}/read', [SlotsController::class, 'read']);
    Route::post('{slot:name_slug}/update', [SlotsController::class, 'update']);
    Route::delete('{slot:name_slug}/delete', [SlotsController::class, 'delete']);

    Route::view('{slot:name_slug}', 'admin.slots.item');
});


Route::prefix('debtors')->group(function () {
    Route::view('/', 'admin.debtors.list');
    Route::get('getList', [DebtorsController::class, 'getList']);

    Route::view('create', 'admin.debtors.item');
    Route::post('create', [DebtorsController::class, 'create']);

    Route::get('{debtor:name_slug}/read', [DebtorsController::class, 'read']);
    Route::post('{debtor:name_slug}/update', [DebtorsController::class, 'update']);
    Route::delete('{debtor:name_slug}/delete', [DebtorsController::class, 'delete']);

    Route::view('{debtor:name_slug}', 'admin.debtors.item');
});

Route::prefix('courts')->group(function () {
    Route::view('/', 'admin.courts.list');
    Route::get('getList', [CourtsController::class, 'getList']);

    Route::post('create', [CourtsController::class, 'create']);

    Route::post('{court:name_slug}/update', [CourtsController::class, 'update']);
    Route::delete('{court:name_slug}/delete', [CourtsController::class, 'delete']);
});


Route::prefix('directions')->group(function () {
    Route::view('/', 'admin.directions.list');
    Route::get('getList', [DirectionsController::class, 'getList']);

    Route::post('create', [DirectionsController::class, 'create']);

    Route::post('{direction:name_slug}/update', [DirectionsController::class, 'update']);
    Route::delete('{direction:name_slug}/delete', [DirectionsController::class, 'delete']);
});

Route::prefix('categories')->group(function () {
    Route::view('/', 'admin.categories.list');
    Route::get('getList', [CategoriesController::class, 'getList']);

    Route::post('create', [CategoriesController::class, 'create']);

    Route::post('{category:name_slug}/update', [CategoriesController::class, 'update']);
    Route::delete('{category:name_slug}/delete', [CategoriesController::class, 'delete']);
});
