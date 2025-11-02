<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Color extends Model
{
    protected $table = 'colors';

    public $timestamps = false;

    protected $fillable = ['name'];

    /**
     * Get products that owns this color.
     *
     * @return HasMany<Product, Color>
     */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
