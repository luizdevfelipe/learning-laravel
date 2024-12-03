<?php

use App\Http\Controllers\DocumentController;
use App\Http\Middleware\SomeOtherMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/documents', [DocumentController::class, 'index'])->name('documents');

Route::prefix('/administration')->middleware('role:admin')->group(function () {
    Route::get('/', function () {
        return 'Secret Admin Page';
    });

    Route::withoutMiddleware(SomeOtherMiddleware::class)->group(function () {
        Route::get('/other', function () {
            return 'Another Admin Page';
        });
    });
});
