<?php

namespace App\Models;

use Faker\Provider\Base;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends BaseModel
{
    use HasFactory;

    protected $fillable = ['title'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function scopeHasDifferentCounts($query)
    {
        $categories = $query->withCount('products')->get();

        $categoriesWithProducts = $categories
            ->filter(fn($cat) => $cat->products_count > 0);

        if ($categoriesWithProducts->isEmpty()) {
            return $query->whereRaw('1 = 0');
        }

        $max = $categoriesWithProducts->max('products_count');
        $min = $categoriesWithProducts->min('products_count');

        if ($max === $min) {
            return $query->whereRaw('1 = 0');
        }

        return $query;
    }
}
