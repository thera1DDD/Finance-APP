<?php


namespace App\Actions;

use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class ManageTransactionAction
{
    public function create(array $data)
    {
        return Transaction::create(array_merge($data, ['user_id' => Auth::id()]));
    }

    public function update(Transaction $transaction, array $data)
    {
        $transaction->update($data);
        return $transaction;
    }

    public function delete(Transaction $transaction)
    {
        return $transaction->delete();
    }
}
