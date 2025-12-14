<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    // Shop page
    public function index()
    {
        // Dummy products with categories
        $products = [
            'Electronics' => [
                (object)[
                    'id' => 1,
                    'name' => 'Smartphone XYZ',
                    'price' => 29999,
                    'image' => 'https://images.unsplash.com/photo-1517336714731-489689fd1ca8',
                ],
                (object)[
                    'id' => 2,
                    'name' => 'Laptop ABC',
                    'price' => 55999,
                    'image' => 'https://images.unsplash.com/photo-1511707171634-5f897ff02aa9',
                ],
                (object)[
                    'id' => 3,
                    'name' => 'Headphones 123',
                    'price' => 5999,
                    'image' => 'https://images.unsplash.com/photo-1580894908361-967195033215',
                ],
            ],
            'Fashion' => [
                (object)[
                    'id' => 4,
                    'name' => 'T-shirt Cool',
                    'price' => 799,
                    'image' => 'https://images.unsplash.com/photo-1521335629791-ce4aec67dd47',
                ],
                (object)[
                    'id' => 5,
                    'name' => 'Jeans Slim Fit',
                    'price' => 1999,
                    'image' => 'https://images.unsplash.com/photo-1503341455253-583bb7270b66',
                ],
            ],
        ];

        return view('shop.index', compact('products'));
    }

    // Product detail page
    public function show($id)
    {
        // Unified product data with multiple images
        $products = [
            1 => [
                'id' => 1,
                'name' => 'Smartphone XYZ',
                'price' => 29999,
                'description' => 'Latest smartphone with amazing features.',
                'image' => 'https://images.unsplash.com/photo-1517336714731-489689fd1ca8',
                'images' => [
                    'https://images.unsplash.com/photo-1517336714731-489689fd1ca8',
                    'https://images.unsplash.com/photo-1511707171634-5f897ff02aa9',
                    'https://images.unsplash.com/photo-1580894908361-967195033215',
                ],
            ],
            2 => [
                'id' => 2,
                'name' => 'Laptop ABC',
                'price' => 55999,
                'description' => 'High-performance laptop for work & gaming.',
                'image' => 'https://images.unsplash.com/photo-1511707171634-5f897ff02aa9',
                'images' => [
                    'https://images.unsplash.com/photo-1511707171634-5f897ff02aa9',
                    'https://images.unsplash.com/photo-1580894908361-967195033215',
                ],
            ],
            3 => [
                'id' => 3,
                'name' => 'Headphones 123',
                'price' => 5999,
                'description' => 'Noise-cancelling over-ear headphones.',
                'image' => 'https://images.unsplash.com/photo-1580894908361-967195033215',
                'images' => [
                    'https://images.unsplash.com/photo-1580894908361-967195033215',
                ],
            ],
            4 => [
                'id' => 4,
                'name' => 'T-shirt Cool',
                'price' => 799,
                'description' => 'Cotton casual t-shirt.',
                'image' => 'https://images.unsplash.com/photo-1521335629791-ce4aec67dd47',
                'images' => [
                    'https://images.unsplash.com/photo-1521335629791-ce4aec67dd47',
                ],
            ],
            5 => [
                'id' => 5,
                'name' => 'Jeans Slim Fit',
                'price' => 1999,
                'description' => 'Stylish slim fit jeans.',
                'image' => 'https://images.unsplash.com/photo-1503341455253-583bb7270b66',
                'images' => [
                    'https://images.unsplash.com/photo-1503341455253-583bb7270b66',
                ],
            ],
        ];

        $product = $products[$id] ?? null;

        if(!$product) {
            abort(404); // Show 404 if product doesn't exist
        }

        return view('shop.product', compact('product'));
    }
}
