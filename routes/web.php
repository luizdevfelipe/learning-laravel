<?php

use App\Facade\Payment;
use App\Http\Controllers\DocumentController;
use App\Http\Middleware\SomeOtherMiddleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

Route::get('/', function () {
    Payment::process(['transactionId' => 123]);
    return View::make('welcome');
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
