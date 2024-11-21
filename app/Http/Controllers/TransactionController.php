<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index(): string
    {
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
}
