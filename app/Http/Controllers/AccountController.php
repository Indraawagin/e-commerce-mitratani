<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function account()
    {
        $user = Auth::user();
        return view('pages.account', [
            'user' => $user
        ]);
    }

    public function update(Request $request, $redirect)
    {
        $data = $request->all();
        $item = Auth::user();
        $item->update($data);

        return redirect()->route($redirect);
    }
}
