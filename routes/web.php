<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/transactions', function () {
    return View::make('transactions', [
        'totalIncome' => 50000,
        'totalExpense' => 45000,
        'netSaving' => 5000,
        'goal' => 7500,
    ]);
})->name('transactions');

Route::get('/categories', function () {
    return View::make('categories');
})->name('categories');