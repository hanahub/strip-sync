<?php

namespace App\Traits;


use Illuminate\Database\Eloquent\Builder;

trait Enableable
{
    /**
     * @param Builder $query
     * @return Builder
     */
    public function scopeEnabled($query)
    {
        return $query->where('is_enabled', 1);
    }

    /**
     * @return bool
     */
    public function isEnabled(): bool
    {
        return (bool)$this->is_enabled;
    }

    /**
     * @return self
     */
    public function toggleOfEnabling()
    {
        $this->is_enabled = ! $this->is_enabled;

        return $this;
    }
}