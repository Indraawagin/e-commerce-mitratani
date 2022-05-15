<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;

class StoreProfileController extends Controller
{
    public function index()
    {
        $item = Store::all();
        return view('pages.store-profile', [
            'item' => $item,
        ]);
    }
}
