<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index(): string
    {
        echo route('transaction', ['transactionId' => 5]) . '<br>';
        // return to_route('transaction', ['transactionId' => 5]);
        return 'Transactions Page';
    }

    public function show(int $transaction): string
    {
        return 'Transaction: '. $transaction;
    }

    public function create(): string
    {
        return 'Form to creat a Transaction';
    }

    public function store(): string
    {
        return 'Transaction Created';
    }

    public function documents(int $transactionId): string
    {   
        echo route('transactions.documents', ['transactionId' => $transactionId]) . '<br>';
        return 'Transaction Documents';
    }
}
