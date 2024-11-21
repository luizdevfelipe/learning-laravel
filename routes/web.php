<?php

use App\Enums\FileType;
use App\Http\Controllers\TransactionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/transactions', [TransactionController::class, 'index']);
Route::get('/transactions/{transactionId}', [TransactionController::class, 'show']);
Route::get('/transactions/create', [TransactionController::class, 'create']);
Route::post('/transaction', [TransactionController::class, 'store']);
