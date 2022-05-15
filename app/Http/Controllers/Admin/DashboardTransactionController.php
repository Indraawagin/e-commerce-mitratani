<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Transaction;
use App\Models\TransactionDetail;

use Illuminate\Http\Request;

class DashboardTransactionController extends Controller
{
    public function index()
    {
        $transactions = TransactionDetail::with(['transaction.user', 'product.galleries', 'product.category'])->latest()->take(8);
        $revenue = Transaction::sum('total_price');
        $customer = User::count();
        return view('pages.admin.dashboard-transactions', [
            'customer' => $customer,
            'revenue' => $revenue,
            'transaction_count' => $transactions->count(),
            'transaction_data' => $transactions->get(),
        ]);
    }

    public function details(Request $request, $id)
    {
        $transactions = TransactionDetail::with(['transaction.user', 'product.galleries', 'product.category']);
        return view('pages.admin.dashboard-transaction-details');
    }
}
