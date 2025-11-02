<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $table = 'categories';

    public $timestamps = false;

    protected $fillable = [
        'id',
        'name',
        'slug',
        'parent_id',
        'discount_id',
        'is_active',
    ];

    /**
     * Get parent category.
     *
     * @return BelongsTo<Category, Category>
     */
    public function parent(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    /**
     * Get child categories.
     *
     * @return HasMany<Category, Category>
     */
    public function children(): HasMany
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    /**
     * Get products that owns this category.
     *
     * @return HasMany<Product, Category>
     */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    /**
     * Get discount that owns this category.
     *
     * @return BelongsTo<Discount, Category>
     */
    public function discount(): BelongsTo
    {
        return $this->belongsTo(Discount::class);
    }
}
