<?php


namespace App\Actions;

use App\Models\Transaction;
use App\Services\TransactionService;

class TransactionAction
{
    protected $transactionService;

    public function __construct(TransactionService $transactionService)
    {
        $this->transactionService = $transactionService;
    }

    public function getAllTransactions($startDate = null, $endDate = null)
    {
        return $this->transactionService->getTransactionsForUser($startDate, $endDate);
    }

    public function create(array $data)
    {
        return $this->transactionService->createTransaction($data);
    }

    public function update(Transaction $transaction, array $data)
    {
        return $this->transactionService->updateTransaction($transaction, $data);
    }

    public function delete(Transaction $transaction)
    {
        return $this->transactionService->deleteTransaction($transaction);
    }

    public function getTotals($startDate = null, $endDate = null)
    {
        return $this->transactionService->calculateTotalsForUser($startDate, $endDate);
    }
}
