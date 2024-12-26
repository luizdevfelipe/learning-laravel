<?php

use App\Facade\Payment;
use App\Http\Controllers\DocumentController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

Route::get('/', function () {
    Payment::process(['transactionId' => 123]);
    return View::make('welcome');
});

Route::get('/documents', [DocumentController::class, 'index'])->name('documents');

Route::get('/examples/pipeline', function () {
    $order = [
        'total' => 100,
        'discount' => 10,
    ];

    dd(Illuminate\Support\Facades\Pipeline::send($order)
        ->through([
            \App\Pipelines\Order\ValidateOrder::class,
            \App\Pipelines\Order\CalculateShipping::class,
            \App\Pipelines\Order\ApplyDiscount::class,
            \App\Pipelines\Order\GenerateInvoice::class,
            \App\Pipelines\Order\CompleteOrder::class,
        ])
        ->thenReturn());
});
