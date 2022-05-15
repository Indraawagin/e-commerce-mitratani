<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $customer = User::count();
        $revenue = Transaction::sum('total_price');
        $qtys = Transaction::sum('qty');
        $transaction = Transaction::count();
        $charts = TransactionDetail::select('products_id', DB::raw('sum(qty) qty'))
            ->groupBy('products_id')
            ->orderBy('qty', 'desc')
            ->limit(4)
            ->get();

        $chartSale = [];
        $qty = [];
        foreach ($charts as $chart) {
            $chartSale[] = (int)$chart->qty;
            $qty[] = $chart->product->name;
        }

        // dd($chartSale, $qty);

        return view(
            'pages.owner.dashboard',
            compact('customer', 'revenue', 'transaction', 'chartSale', 'qty', 'qtys')
        );
    }
}
