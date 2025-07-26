<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Product;

class CategoryController extends Controller
{
    public function __invoke($cat_id)
    {
        $products = Product::active()->where('category_id', $cat_id)->paginate(15);
        return view('shop', compact('products'));
    }
}
