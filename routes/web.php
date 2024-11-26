<?php

use App\Http\Controllers\DocumentController;
use App\Http\Controllers\ProcessTransactionController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/documents', [DocumentController::class, 'index'])->name('documents');

Route::name('transactions.')->prefix('/transactions')->group(function () {
    Route::controller(TransactionController::class)->group(function () {
        Route::get('/', 'index')->name('home');
        Route::get('/create', 'create')->name('create');
        Route::get('/{transactionId}', 'show')->name('show');
        Route::post('/', 'store')->name('store');
        Route::get('/{transactionId}/documents', 'documents')->name('documents');
    });

    Route::get('/{transactionId}/process', ProcessTransactionController::class);
});
