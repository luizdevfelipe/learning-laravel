<?php

namespace App\Http\Controllers;

use App\Contracts\PaymentProcessor;
use App\Services\TransactionService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;

class TransactionController extends Controller implements HasMiddleware
{
    public function __construct(
        private readonly TransactionService $transactionService,
        private readonly PaymentProcessor   $paymentProcessor,
    ) {}

    public function index(Request $request): string
    {
        echo $request->headers->get('X-Request-Id') . '<br>';
        return 'Transactions Page';
    }

    public function show(int $transactionId): string
    {
        $transaction = $this->transactionService->findTransaction($transactionId);
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
