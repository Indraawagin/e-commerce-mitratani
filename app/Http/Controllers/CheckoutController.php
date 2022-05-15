<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use App\Models\Product;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function process(Request $request)
    {
        // Save user data
        $user = Auth::user();
        $user->update($request->except('total_price'));
        $code = 'MITRATANI-' . mt_rand(000000, 999999);
        $carts = Cart::with(['product', 'user'])->where('users_id', Auth::user()->id)->get();
        $transaction = Transaction::create([
            'users_id' => Auth::user()->id,
            'qty' => $request->qty,
            'total_price' => $request->total_price,
            'order_date' => Carbon::now()->isoFormat('dddd, D MMMM Y'),
            'transactions_status' => 'BELUM BAYAR',
            'code' => $code,
            'delivery' => $request->delivery
        ]);

        foreach ($carts as $cart) {
            $trx = 'TRX' . mt_rand(000000, 999999);

            TransactionDetail::create([
                'transactions_id' => $transaction->id,
                'products_id' => $cart->product->id,
                'price' => $cart->product->price,
                'date_sent' => '',
                'shipping_status' => 'TERTUNDA',
                'resi' => '',
                'code' => $trx,
                'qty' => $cart->qty,
            ]);

            $product = Product::findOrFail($cart->product->id);
            $product->update([
                'stock' => ($product->stock - $cart->qty)
            ]);
        }


        // Delete Cart Data
        Cart::where('users_id', Auth::user()->id)->delete();

        return view('pages.checkout');
    }

    public function success(Request $request)
    {
        // Save user data
        $user = Auth::user();
        $user->update($request->except('total_price'));
        $code = 'MITRATANI-' . mt_rand(000000, 999999);
        $carts = Cart::with(['product', 'user'])->where('users_id', Auth::user()->id)->get();
        $transaction = Transaction::create([
            'users_id' => Auth::user()->id,
            'qty' => $request->qty,
            'total_price' => $request->total_price,
            'order_date' => Carbon::now()->isoFormat('dddd, D MMMM Y'),
            'transactions_status' => 'BELUM BAYAR',
            'code' => $code,
            'delivery' => $request->delivery
        ]);

        foreach ($carts as $cart) {
            $trx = 'TRX' . mt_rand(000000, 999999);

            TransactionDetail::create([
                'transactions_id' => $transaction->id,
                'products_id' => $cart->product->id,
                'price' => $cart->product->price,
                'date_sent' => '',
                'shipping_status' => 'TERTUNDA',
                'resi' => '',
                'code' => $trx,
                'qty' => $cart->qty,
            ]);

            $product = Product::findOrFail($cart->product->id);
            $product->update([
                'stock' => ($product->stock - $cart->qty)
            ]);
        }

        // Delete Cart Data
        Cart::where('users_id', Auth::user()->id)->delete();
        return view('pages.success');
    }
}
