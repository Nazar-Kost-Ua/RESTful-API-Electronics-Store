<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory ,SoftDeletes;

    protected $table = 'products';

    protected $fillable = [
        'title',
        'brand_id',
        'category_id',
        'color_id',
        'stock',
        'price',
        'currency',
        'discount_id',
        'sku',
        'slug',
        'status',
    ];

    /**
     * Get attributes that owns this product.
     *
     * @return BelongsToMany<Attribute, Product>
     */
    public function attributes(): BelongsToMany
    {
        return $this->belongsToMany(Attribute::class)
            ->withPivot(['value']);
    }

    /**
     * Get the product brand.
     *
     * @return BelongsTo<Brand, Product>
     */
    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    /**
     * Get the product category.
     *
     * @return BelongsTo<Category, Product>
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the product color.
     *
     * @return BelongsTo<Color, Product>
     */
    public function color(): BelongsTo
    {
        return $this->belongsTo(Color::class);
    }

    /**
     * Get images that owns this product.
     *
     * @return HasMany<ProductImage, Product>
     */
    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class);
    }

    /**
     * Get tags that owns this product.
     *
     * @return HasMany<ProductTag, Product>
     */
    public function productTag(): HasMany
    {
        return $this->hasMany(ProductTag::class);
    }

    /**
     * Get discounts that owns this product.
     *
     * @return BelongsTo<Discount, Product>
     */
    public function discount(): BelongsTo
    {
        return $this->belongsTo(Discount::class);
    }

    /**
     * Get reviews that owns this product.
     *
     * @return HasMany<Review, Product>
     */
    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    /**
     * Get users that added this product in wishlist.
     *
     * @return BelongsToMany<User, Product>
     */
    public function wishlistedBy(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'wishlist');
    }

    /**
     * Get users that was added this product in own cart.
     *
     * @return HasMany<CartItem, Product>
     */
    public function inCarts(): HasMany
    {
        return $this->hasMany(CartItem::class)
            ->withPivot(['quantity', 'price'])
            ->withTimestamps();
    }

    /**
     * Get orders that contain this product.
     *
     * @return HasMany<OrderItem, Product>
     */
    public function orders(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }
}
