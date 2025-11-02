<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Brand extends Model
{
    protected $table = 'brands';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'slug',
        'discount_id',
        'is_active',
    ];

    /**
     * Get products that owns this brand.
     *
     * @return HasMany<Product, Brand>
     */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    /**
     * Get discounts that owns this brand.
     *
     * @return BelongsTo<Discount, Brand>
     */
    public function discount(): BelongsTo
    {
        return $this->belongsTo(Discount::class);
    }
}
