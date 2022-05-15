<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DetailController extends Controller
{
    public function index(Request $request, $id)
    {
        $product = Product::with(['galleries', 'category'])->where('slug', $id)->firstOrFail();
        return view('pages.detail', [
            'product' => $product
        ]);
    }

    public function add(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $data = [
            'products_id' => $id,
            'users_id' => Auth::user()->id,
            'qty' => $request->qty
        ];
        if ($product->stock >= $request->qty) {
            $cart = Cart::with(['product'])->get();
            Cart::create($data);
            return redirect()->route('cart');
        } else {
            return redirect()->back()->with(['warning' => 'Stok Tidak Cukup']);
        }
    }
}
