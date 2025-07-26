<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends BaseModel
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'category_id',
        'user_id',
        'image',
        'price',
        'title',
        'description',
        'status',
        'quantity'
    ];

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function details()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
