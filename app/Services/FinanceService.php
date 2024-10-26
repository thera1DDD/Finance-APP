<?php

namespace App\Services;

use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class FinanceService
{
    public function getTransactions($from = null, $to = null)
    {
        $query = Transaction::where('user_id', Auth::id());

        if ($from) {
            $query->where('date', '>=', $from);
        }

        if ($to) {
            $query->where('date', '<=', $to);
        }

        return $query->orderBy('date', 'desc')->get();
    }

    public function calculateTotals($transactions)
    {
        $income = $transactions->where('type', 'income')->sum('amount');
        $expense = $transactions->where('type', 'expense')->sum('amount');

        return compact('income', 'expense');
    }
}
