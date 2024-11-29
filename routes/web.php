<?php

use App\Http\Controllers\DocumentController;
use App\Http\Middleware\CheckUserRole;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/documents', [DocumentController::class, 'index'])->name('documents');

Route::get('/administration', function() {
    return 'Secret Admin Page';
})->middleware(CheckUserRole::class);
