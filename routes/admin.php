<?php

use App\Http\Controllers\Admin\DebtorsController;
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
