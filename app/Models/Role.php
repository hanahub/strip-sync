<?php

namespace App\Models;

use App\Traits\Enableable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use SoftDeletes, Enableable;

    /**
     * The model's attributes.
     *
     * @var array
     */
    protected $visible = ['id', 'slug', 'permissions', 'is_enabled'];

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


}
