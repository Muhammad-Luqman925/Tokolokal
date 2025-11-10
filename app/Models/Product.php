<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'slug',
        'description',
        'price',
        'stock',
        'image',
        'variants',
        'is_active',
        'is_featured',
        'rating',
        'is_flash_sale',
        'flash_sale_price',
        'flash_sale_start',
        'flash_sale_end',
    ];

    protected $casts = [
        'variants' => 'array',
        'is_active' => 'boolean',
        'is_featured' => 'boolean',
        'is_flash_sale' => 'boolean',
        'flash_sale_start' => 'datetime',
        'flash_sale_end' => 'datetime',
    ];

<<<<<<< HEAD
    // 🔹 Format harga normal
=======
    protected $appends = [
        'image_url',
    ];

>>>>>>> 715f2269e080ba6d207564aabab742cda01e5e38
    public function getFormattedPriceAttribute(): string
    {
        return 'Rp ' . number_format($this->price, 0, ',', '.');
    }

<<<<<<< HEAD
    // 🔹 Format harga flash sale jika aktif
=======
>>>>>>> 715f2269e080ba6d207564aabab742cda01e5e38
    public function getEffectivePriceAttribute(): string
    {
        if ($this->is_flash_sale && $this->flash_sale_price) {
            return 'Rp ' . number_format($this->flash_sale_price, 0, ',', '.');
        }
<<<<<<< HEAD
        return $this->formatted_price;
    }

    // 🔹 Slug otomatis saat create
=======

        return $this->formatted_price;
    }

>>>>>>> 715f2269e080ba6d207564aabab742cda01e5e38
    protected static function booted(): void
    {
        static::creating(function ($product) {
            if (empty($product->slug)) {
                $product->slug = Str::slug($product->name) . '-' . uniqid();
            }
        });
    }

<<<<<<< HEAD
    // 🔹 Relasi ke seller (user)
=======
>>>>>>> 715f2269e080ba6d207564aabab742cda01e5e38
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

<<<<<<< HEAD
    // 🔹 Scope produk aktif
=======
    public function getImageAttribute($value): ?string
    {
        if (blank($value)) {
            return null;
        }

        if (filter_var($value, FILTER_VALIDATE_URL)) {
            return $value;
        }

        return asset('storage/' . ltrim($value, '/'));
    }

    public function getImageUrlAttribute(): ?string
    {
        if (blank($this->image)) {
            return null;
        }

        return $this->image;
    }

>>>>>>> 715f2269e080ba6d207564aabab742cda01e5e38
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

<<<<<<< HEAD
    // 🔹 Scope produk unggulan
=======
>>>>>>> 715f2269e080ba6d207564aabab742cda01e5e38
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true)
            ->where('is_active', true);
    }

<<<<<<< HEAD
    // 🔹 Scope flash sale aktif
=======
>>>>>>> 715f2269e080ba6d207564aabab742cda01e5e38
    public function scopeActiveFlashSale($query)
    {
        return $query->where('is_active', true)
            ->where('is_flash_sale', true)
            ->where(function ($q) {
                $q->whereNull('flash_sale_start')
<<<<<<< HEAD
                  ->orWhere('flash_sale_start', '<=', now());
            })
            ->where(function ($q) {
                $q->whereNull('flash_sale_end')
                  ->orWhere('flash_sale_end', '>=', now());
=======
                    ->orWhere('flash_sale_start', '<=', now());
            })
            ->where(function ($q) {
                $q->whereNull('flash_sale_end')
                    ->orWhere('flash_sale_end', '>=', now());
>>>>>>> 715f2269e080ba6d207564aabab742cda01e5e38
            });
    }
}
