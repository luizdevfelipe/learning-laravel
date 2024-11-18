<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function() {
    return view('welcome');
});

Route::get('/transactions/{transactionId}', function($transactionId) {
    return  'The id of the current transaction is ' . $transactionId;
});

Route::get('/transactions/{transactionId}/files/{fileId}', function($id, $fileId) {
    return  'The id of the current transaction is ' . $id . ' and the file accessed is ' . $fileId;
});

Route::get('/report/{year}/{month?}', function($year, $month = 'x') {
    return  'Generating report for ' . $year . '/' . $month;
});