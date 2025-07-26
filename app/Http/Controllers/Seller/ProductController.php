<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddProductRequest;
use App\Http\Requests\EditProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class ProductController extends Controller
{
    protected array $methodsToConvert = ['store', 'update'];

    public function index(Request $request)
    {
        $query = $this->getSearchQuery($request);
        $entries = getEntriesData($request, [5,10,25,50,75], 25);
        $sortData = $this->getSortingData($request);

        $products = $query
            ->orderBy($sortData['field'], $sortData['dir'])
            ->paginate($entries)
            ->withQueryString();

        return view(
            'seller.products.index', compact('products', 'entries')
        );
    }

    public function create()
    {
        $categories = Category::all();
        return view('seller.products.create', compact('categories'));
    }

    public function store(AddProductRequest $request)
    {
        $imagePath = $this->getFilename($request);
        $data = $request->validated();

        $data['category_id'] = $data['category'];
        $data['user_id'] = Auth::id();
        $data['image'] = $imagePath;
        $data['price'] = intval($data['price']);
        $data['quantity'] = intval($data['quantity']);
        unset($data['category']);

        Product::create($data);

        return redirect()->route('seller.products.index');
    }

    public function edit(Product $product)
    {
        $this->authorizeProduct($product);
        $categories = Category::all();
        return view('seller.products.edit', compact('product', 'categories'));
    }

    private function authorizeProduct(Product $product)
    {
        if ($product->user_id !== Auth::id()) {
            abort(403, 'شما اجازه دسترسی به این محصول را ندارید.');
        }
    }

    public function update(EditProductRequest $request, Product $product)
    {
        $this->authorizeProduct($product);
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $filename = $this->getFilename($request);
            $data['image'] = $filename;
        }

        $data['price'] = intval($data['price']);
        $data['quantity'] = intval($data['quantity']);
        $data['category_id'] = $data['category'];
        unset($data['category']);

        $product->update($data);

        return redirect()->route('seller.products.index');
    }

    public function destroy(Product $product)
    {
        $this->authorizeProduct($product);
        $product->delete();
        return redirect()->back();
    }

    private function getFilename(Request $request): string
    {
        $file = $request->file('image');

        $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
        $path = public_path('assets/images/' . $filename);

        if (!file_exists(public_path('assets/images'))) {
            mkdir(public_path('assets/images'), 0755, true);
        }

        $manager = new ImageManager(new Driver());
        $image = $manager->read($file)->scaleDown(width: 500, height: 500);

        $image->save($path, 80);

        return 'assets/images/' . $filename;
    }


    public function changeStatus(Product $product)
    {
        $this->authorizeProduct($product);
        $product->status = !($product->status);
        $product->save();

        return redirect()->back();
    }

    private function getSortingData(Request $request): array
    {
        $sortField = $request->get('sort', 'id');
        $sortDir = $request->get('dir', 'asc');

        $validFields = ['id', 'title', 'price', 'quantity', 'status'];
        $validDirs = ['asc', 'desc'];

        return [
            'field' => in_array($sortField, $validFields) ? $sortField : 'id',
            'dir'   => in_array($sortDir, $validDirs) ? $sortDir : 'asc'
        ];
    }

    private function getSearchQuery(Request $request)
    {
        $search = $request->get('search');
        $query = Product::query()
            ->where('user_id', '=', Auth::id())
            ->with('category');

        if ($search) {
            $query->where('title', 'like', "%$search%");
        }

        return $query;
    }
}
