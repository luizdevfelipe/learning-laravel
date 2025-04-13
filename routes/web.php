<?php

use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

Route::prefix('transactions')->name('transactions.')->controller(TransactionController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::get('/{transactionId}', 'show')->name('show');
    Route::post('/', 'store')->name('store');
});

Route::get('/categories', function () {
    return View::make('categories');
})->name('categories');