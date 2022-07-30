<?php

namespace App\Services;

use App\Models\Transaction;

class TransactionService
{
    protected $transaction;

    public function __construct(Transaction $transaction)
    {
        $this->transaction = $transaction;
    }

    public function getData()
    {
        $transaction = Transaction::orderBy('time', 'DESC')->get();
        return $transaction;
    }

    public function getShowData($id)
    {
        $transaction = Transaction::findOrfail($id);
        return $transaction->get();
    }
}
