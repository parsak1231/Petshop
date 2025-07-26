<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    public $timestamps = true;

    protected static function booted(): void
    {
        static::creating(function ($model) {
            $model->updated_at = null;
        });

        static::updating(function ($model) {
            $model->updated_at = now();
        });
    }
}
