<?php

namespace App\Services;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionService
{
    public function createTransaction(array $data): void
    {
        $data['user_id'] = Auth::id();
        $data['transaction_date'] = $data['transaction_date'] ?? now();
        Transaction::create($data);
    }

    public function updateTransaction(Transaction $transaction, array $data): void
    {
        $transaction->update($data);
    }

    public function deleteTransaction(Transaction $transaction): void
    {
        $transaction->delete();
    }

    public function getFilteredTransactions(Request $request): array
    {
        $transactions = Transaction::when($request->input('start_date'), function ($query) use ($request) {
            $query->where('transaction_date', '>=', $request->input('start_date'));
        })->when($request->input('end_date'), function ($query) use ($request) {
            $query->where('transaction_date', '<=', $request->input('end_date'));
        })->where('user_id', auth()->id())->get();

        $totalIncome = $transactions->where('category', 'income')->sum('amount');
        $totalExpense = $transactions->where('category', 'expense')->sum('amount');

        return [
            'transactions' => $transactions,
            'totalIncome' => $totalIncome,
            'totalExpense' => $totalExpense,
        ];
    }
}
