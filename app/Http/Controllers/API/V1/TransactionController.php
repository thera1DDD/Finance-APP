<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\TransactionRequest;
use App\Models\Transaction;
use App\Services\TransactionService;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class TransactionController extends Controller
{

    protected $transactionService;

    public function __construct(TransactionService $transactionService)
    {
        $this->transactionService = $transactionService;
    }

    public function index(Request $request): Response
    {
        $data = $this->transactionService->getFilteredTransactions($request);

        return Inertia::render('Transactions/Index', [
            'transactions' => $data['transactions'],
            'totalIncome' => $data['totalIncome'],
            'totalExpense' => $data['totalExpense'],
        ]);
    }

    public function store(TransactionRequest $request)
    {
        $this->transactionService->createTransaction($request->validated());

        return redirect()->route('transactions.index');
    }

    public function edit(Transaction $transaction)
    {
        return Inertia::render('Transactions/Edit', [
            'transaction' => $transaction,
        ]);
    }

    public function update(TransactionRequest $request, Transaction $transaction)
    {
        $this->transactionService->updateTransaction($transaction, $request->validated());

        return redirect()->route('transactions.index');
    }

    public function destroy(Transaction $transaction)
    {
        $this->transactionService->deleteTransaction($transaction);

        return redirect()->route('transactions.index');
    }
}
