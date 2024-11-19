<?php

use App\Enums\FileType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/transactions/{transactionId}', function (int $transactionId) {
    return  'The id of the current transaction is ' . $transactionId;
});

Route::get('/transactions/{transactionId}/files/{fileType}', function (int $id, FileType $fileType) {
    return  'The id of the current transaction is ' . $id . ' and the file accessed is ' . $fileType->value;
});//->whereIn('fileType', ['receipt', 'statement']);

Route::get('/report/{reportId}', function (Request $request, int $reportId) {
    //http://localhost/report/22?year=2024&month=11
    $year = $request->get('year');
    $month = $request->get('month');

    return  'Generating report ' . $reportId . ' for ' . $year . '/' . $month;    
})->where('reportId', '[0-9]+');
