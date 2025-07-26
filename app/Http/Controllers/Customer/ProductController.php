<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::active()->paginate(15);
        return view('shop', compact('products'));
    }

    public function show($product_id)
    {
        $product = Product::active()
            ->with(['comments' => function($query) {
                $query->latest();
            }, 'comments.user'])
            ->where('id', $product_id)
            ->firstOrFail();

        return view('page-shop', compact('product'));
    }
}
