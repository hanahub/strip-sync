<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use SoftDeletes;

    protected $fillable = ['title', 'slug', 'permissions', 'is_enabled'];

    protected $casts = [
        'permissions' => 'array',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }

    /**
     * @return bool
     */
    public function isEnabled(): bool
    {
        return (bool)$this->is_enabled;
    }

    /**
     * @return Role
     */
    public function toggleOfEnabling()
    {
        $this->is_enabled = ! $this->is_enabled;

        return $this;
    }
}
