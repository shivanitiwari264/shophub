<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function process(Request $request, $id)
    {
        // CSRF token check automatically hota hai
        // Validation
        $request->validate([
            'card_number' => 'required',
            'expiry' => 'required',
            'cvv' => 'required',
            'name' => 'required',
            'email' => 'required|email',
        ]);

        // 🔥 Abhi fake payment success (demo)
        return redirect()
            ->back()
            ->with('success', 'Payment successful! Order placed 🎉');
    }
}
return redirect()->route('order.confirm');
