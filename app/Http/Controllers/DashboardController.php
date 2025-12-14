<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Recent 5 orders
        $recentOrders = Order::where('user_id', $user->id)
                             ->orderBy('created_at', 'desc')
                             ->take(5)
                             ->get();

        // Make sure these methods exist in User model
        $cartCount = method_exists($user, 'cartItems') ? $user->cartItems()->count() : 0;
        $wishlistCount = method_exists($user, 'wishlistItems') ? $user->wishlistItems()->count() : 0;
        $ordersCount = method_exists($user, 'orders') ? $user->orders()->count() : 0;

        // Pass variables to view
        return view('dashboard', compact('recentOrders', 'cartCount', 'wishlistCount', 'ordersCount'));
    }
}
