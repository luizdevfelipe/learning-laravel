<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/transactions', function () {
    return View::make('transactions');
})->name('transactions');

Route::get('/categories', function () {
    return View::make('categories');
})->name('categories');