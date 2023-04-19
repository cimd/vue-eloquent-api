<?php

namespace Konnec\VueEloquentApi\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

trait Filterable
{
    public function scopeFilter(Builder $query, Collection $request): Builder
    {
        $filters = $this->filters;
        $request->each(function ($value, $key) use ($query, $filters) {
            if (isset($value)) {
                if (isset($filters[$key])) {
                    $class = $filters[$key];
                    (new $class($query, $key, $value))->handle();
                }
            }
        });

        return $query;
    }
}
