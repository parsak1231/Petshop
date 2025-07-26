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
}
