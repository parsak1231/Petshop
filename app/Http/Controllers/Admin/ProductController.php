<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $entries = getEntriesData($request, [5, 10, 20, 25, 50], 20);
        $query = $this->getSearchData($request);

        $products = $query->paginate($entries)->withQueryString();

        return view('admin.products.index',
            compact('products', 'entries')
        );
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->back();
    }

    private function getSearchData(Request $request)
    {
        $search = $request->get("search");
        $query = Product::query();

        if ($search) {
            $query->where("title", "like", "%$search%");
        }
        return $query;
    }

    public function restore($product_id)
    {
        $product = Product::onlyTrashed()->findOrFail($product_id);
        $product->restore();
        return redirect()->back();
    }
}
