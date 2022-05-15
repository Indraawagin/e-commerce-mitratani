<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\TransactionDetail;
use PDF;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class TransactionController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $query = TransactionDetail::with(['transaction.user', 'product.galleries', 'product.category']);

            return Datatables::of($query)
                ->make();
        }
        return view('pages.owner.transaction');
    }

    public function print_pdf()
    {
        $item = TransactionDetail::with(['transaction.user', 'product.galleries', 'product.category'])
            ->orderBy('id', 'desc')
            ->get();
        $pdf = PDF::loadView('transaction_pdf', ['item' => $item])->setPaper('a4', 'landscape');;
        return $pdf->stream();
    }
}
