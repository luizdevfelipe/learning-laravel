<?php

use App\Http\Controllers\ProcessTransactionController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/transactions')->group(function () {
    Route::controller(TransactionController::class)->group(function () {
        Route::get('/', 'index')->name('transactions');
        Route::get('/{transactionId}', 'show')->whereNumber('transactionId');
        Route::get('/create', 'create');
        Route::post('/', 'store');
    });

    Route::get('/{transactionId}/process', ProcessTransactionController::class);
});
