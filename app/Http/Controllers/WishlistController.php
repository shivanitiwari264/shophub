<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class WishlistController extends Controller
{
    public function index()
    {
        // Example: session based wishlist
        $wishlist = session()->get('wishlist', []);
        return view('wishlist.index', compact('wishlist'));
    }

    public function add(Request $request)
    {
        $wishlist = session()->get('wishlist', []);
        $wishlist[$request->id] = $request->name;
        session()->put('wishlist', $wishlist);

        return response()->json(['success' => 'Added to wishlist']);
    }
}
