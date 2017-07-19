<?php

namespace App\Models;

use App\Enums\PageEnum;
use App\Traits\Enableable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use SoftDeletes, Enableable;

    protected $fillable = ['title', 'slug', 'is_enabled'];

    /**
     * @param Builder $query
     * @param $slug
     * @return Builder
     */
    public function scopeFindBySlug($query, $slug)
    {
        return $query->where('slug', $slug);
    }
}
