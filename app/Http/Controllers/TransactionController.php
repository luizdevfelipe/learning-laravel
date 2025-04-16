<?php

namespace App\Http\Controllers;

use App\Contracts\PaymentProcessor;
use App\Services\TransactionService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TransactionController extends Controller
{
    public function __construct(
        private readonly TransactionService $transactionService,
    ) {}

    public function index(): View
    {
        $transactions = $this->transactionService->getAll();

        return view('transactions', [
            'totalIncome' => 50000,
            'totalExpense' => 45000,
            'netSaving' => 5000,
            'goal' => 7500,
        ]);
    }

    public function show(int $transactionId, PaymentProcessor $paymentProcessor): string
    {
        $transaction = $this->transactionService->findTransaction($transactionId);

        $paymentProcessor->process($transaction);

        return 'Transaction: ' . $transaction['transactionId'] . ', ' . $transaction['amount'];
    }

    public function create(): View
    {
        return view('transactions.create');
    }

    public function store(Request $request): string
    {
        $amount = $request->get('transaction_amount');
        $date = $request->get('transaction_date');
        $description = $request->get('transaction_description');

        $this->transactionService->create($amount, new Carbon($date), $description);

        return redirect(route('transactions.index'));
    }
}
