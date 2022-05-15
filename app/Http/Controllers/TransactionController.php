<?php

namespace App\Http\Controllers;

use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = TransactionDetail::with(['transaction.user', 'product.galleries', 'product.category'])
            ->whereHas('transaction', function ($transaction) {
                $transaction->where('users_id', Auth::user()->id);
            })
            ->latest()
            ->get();

        return view('pages.transactions', [
            'transactions' => $transactions
        ]);
    }

    public function details($id)
    {
        $item = TransactionDetail::with(['transaction.user', 'product.galleries', 'product.category'])->findOrFail($id);
        return view('pages.transaction-details', [
            'item' => $item,
        ]);
    }
}
