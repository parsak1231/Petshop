<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddCategoryRequest;
use App\Http\Requests\EditCategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    protected $methodsToConvert = ['store', 'update'];

    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function store(AddCategoryRequest $request)
    {
        $data = $request->validated();

        Category::create($data);

        return redirect()->route('admin.categories.index');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(EditCategoryRequest $request, Category $category)
    {
        $data = $request->validated();

        $category->update($data);

        return redirect()->route('admin.categories.index');
    }

    public function destroy(Category $category)
    {
        if ($category->products()->count() > 0) {
            return redirect()->back()->with('error', 'این دسته‌بندی دارای محصول است و قابل حذف نیست.');
        }
        $category->delete();
        return redirect()->back();
    }
}
