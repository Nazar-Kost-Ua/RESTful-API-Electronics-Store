<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Role extends Model
{
    protected $table = 'roles';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'is_active'
    ];

    /**
     * Get users who own this role.
     *
     * @return HasMany<User, Role>
     */
    public function user(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
