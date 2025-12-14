<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompareController extends Controller
{
    public function index()
    {
        $compare = session()->get('compare', []);
        return view('compare.index', compact('compare'));
    }

    public function add(Request $request)
    {
        $compare = session()->get('compare', []);
        $compare[$request->id] = $request->name;
        session()->put('compare', $compare);

        return response()->json(['success' => 'Added to compare list']);
    }
}
