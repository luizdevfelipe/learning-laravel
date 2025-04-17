<?php

namespace App\Http\Controllers;

use App\Services\TransactionService;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class TransactionController extends Controller
{
    public function __construct(
        private readonly TransactionService $transactionService,
        private readonly Redirector $redirect,
    ) {}

    public function index(): View
    {
        $transactions = $this->transactionService->getAll();

        return view('transactions', [
            'totalIncome'  => 50000,
            'totalExpense' => 45000,
            'netSaving'    => 5000,
            'goal'         => 7500,
            'transactions' => $transactions,
        ]);
    }

    public function edit(int $transactionId): View
    {
        $transaction = $this->transactionService->find($transactionId);

        return view('transactions.edit', [
            'date'        => $transaction->date,
            'amount'      => $transaction->amount,
            'description' => $transaction->description,
        ]);
    }

    public function update(int $transactionId, Request $request)
    {
        $amount = $request->get('transaction_amount');
        $date = $request->get('transaction_date');
        $description = $request->get('transaction_description');

        $this->transactionService->update($transactionId, $amount, new Carbon($date), $description);

        return $this->redirect->to(route('transactions.index'));
    }

    public function destroy(int $transactionId): RedirectResponse
    {
        $this->transactionService->delete($transactionId);

        return $this->redirect->to(route('transactions.index'));
    }

    public function create(): View
    {
        return view('transactions.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $amount = $request->get('transaction_amount');
        $date = $request->get('transaction_date');
        $description = $request->get('transaction_description');

        $this->transactionService->create($amount, new Carbon($date), $description);

        return $this->redirect->to(route('transactions.index'));
    }
}
