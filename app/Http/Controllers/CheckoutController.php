<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        return view('checkout.index');
    }

    public function placeOrder(Request $request)
    {
        // Example order creation
        $order = Order::create([
            'user_id' => Auth::id(),
            'total' => $request->total,
            'status' => 'pending'
        ]);

        return redirect()->route('orders.index')->with('success', 'Order placed successfully!');
    }
}
