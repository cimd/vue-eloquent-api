<?php

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

trait EloquentApi
{
    public function scopeApiQuery(Builder $query, Collection $request): Builder
    {
        if ($request->has('filter')) {
            $query->queryFilters($request->get('filter'));
        }
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
