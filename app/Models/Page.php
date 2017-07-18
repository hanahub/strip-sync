<?php

namespace App\Models;

use App\Enums\PageEnum;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use SoftDeletes;

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

    /**
     * @return bool
     */
    public function isEnabled(): bool
    {
        return (bool)$this->is_enabled;
    }

    /**
     * @return Page
     */
    public function toggleOfEnabling()
    {
        $this->is_enabled = ! $this->is_enabled;

        return $this;
    }
}
