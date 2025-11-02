<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Discount extends Model
{
    use HasFactory;

    protected $table = 'discounts';

    public $timestamps = false;

    protected $fillable = [
        'title',
        'type',
        'value',
        'currency',
        'start_date',
        'end_date',
        'is_active',
    ];

    /**
     * Get products that owns this discount.
     *
     * @return HasMany<Product, Discount>
     */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    /**
     * Get categories that owns this discount.
     *
     * @return HasMany<Category, Discount>
     */
    public function categories(): HasMany
    {
        return $this->hasMany(Category::class);
    }

    /**
     * Get brands that owns this discount.
     *
     * @return HasMany<Brand, Discount>
     */
    public function brands(): HasMany
    {
        return $this->hasMany(Brand::class);
    }

    /**
     * @return HasMany<Tag, Discount>
     */
    public function tags(): HasMany
    {
        return $this->hasMany(Tag::class);
    }
}
