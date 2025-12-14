<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Request $request)
    {
        $cart = session()->get('cart', []);

        $id = $request->id;
        if(isset($cart[$id])) {
            $cart[$id]['qty']++;
        } else {
            $cart[$id] = [
                "id" => $id,
                "name" => $request->name,
                "price" => $request->price,
                "qty" => 1
            ];
        }

        session()->put('cart', $cart);

        return response()->json(['success' => 'Product added to cart!', 'cartCount' => count($cart)]);
    }

    public function update(Request $request)
    {
        $cart = session()->get('cart', []);
        $id = $request->id;
        if(isset($cart[$id])) {
            $cart[$id]['qty'] = $request->qty;
            session()->put('cart', $cart);
        }
        return response()->json(['success' => 'Cart updated!']);
    }

    public function remove(Request $request)
    {
        $cart = session()->get('cart', []);
        $id = $request->id;
        if(isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        return response()->json(['success' => 'Product removed!']);
    }

    public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart.index', compact('cart'));
    }
}
