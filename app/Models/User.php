<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens,
        HasFactory,
        Notifiable,
        HasRoles;

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

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'phone',
        'last_seen_at'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'password' => 'hashed',
        'last_seen_at' => 'datetime'
    ];

    protected $unique = [
        'email',
        'phone',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function getIsOnlineAttribute(): bool
    {
        return $this->last_seen_at && $this->last_seen_at
            ->gt(Carbon::now()->subMinutes(5));
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
