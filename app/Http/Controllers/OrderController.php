<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function place(Request $request, $id)
    {
        // 1️⃣ Validate common fields
        $request->validate([
            'full_name'       => 'required|string|max:255',
            'address_line'    => 'required|string|max:255',
            'city'            => 'required|string|max:100',
            'state'           => 'required|string|max:100',
            'pincode'         => 'required|string|max:20',
            'phone'           => 'required|string|max:20',
            'payment_method'  => 'required|in:card,cod',
        ]);

        $paymentMethod = $request->payment_method;

        // 2️⃣ Card validation (if selected)
        if ($paymentMethod === 'card') {
            $request->validate([
                'card_number'  => 'required|string',
                'expiry'       => 'required|string',
                'cvv'          => 'required|string',
                'name_on_card' => 'required|string',
            ]);

            // 🔐 Payment gateway later
        }

        // 3️⃣ Generate fake Order ID (for now)
        $orderId = 'ORD' . rand(10000, 99999);

        // 4️⃣ Store success message
        session()->flash('success', '🎉 Order placed successfully using '.strtoupper($paymentMethod).'!');

        // 5️⃣ Redirect to confirmation page ✅
        return redirect()->route('order.confirmation', $orderId);
    }
public function confirmation($orderId)
{
    return view('order.confirmation', compact('orderId'));
}
}