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
        private readonly PaymentProcessor   $paymentProcessor,
        private readonly Container          $container,
    ) {}

    public function index(): string
    {
        $this->container->make(PaymentProcessor::class);
        dump(App::make(PaymentProcessor::class));
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
