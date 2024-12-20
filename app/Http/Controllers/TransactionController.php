<?php

namespace App\Http\Controllers;

use App\Contracts\PaymentProcessor;
use App\Services\TransactionService;
use Illuminate\Contracts\Container\Container;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Support\Facades\App;

class TransactionController extends Controller implements HasMiddleware
{
    public function __construct(
        private readonly TransactionService $transactionService,
        private readonly Container          $container,
    ) {}

    public function index(): string
    {
        return 'Transactions Page';
    }

    public function show(int $transactionId, PaymentProcessor $paymentProcessor): string
    {
        $transaction = $this->transactionService->findTransaction($transactionId);

        $paymentProcessor->process($transaction);

        return 'Transaction: ' . $transaction['transactionId'] . ', ' . $transaction['amount'];
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

    public static function middleware()
    {
        return [];
    }
}
