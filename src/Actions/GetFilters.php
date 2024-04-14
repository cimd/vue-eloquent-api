<?php

namespace Konnec\VueEloquentApi\Actions;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

class GetFilters
{
    private Collection $filters;

    public function __construct(
        array $filters,
    ) {
        $this->filters = collect($filters);
    }

    public function handle(Builder $query, array $filter): Builder
    {
        $filter = collect($filter);
        $filters = $this->filters;

        $filter->each(function ($value, $key) use ($query, $filters) {
            if (isset($value, $filters[$key])) {
                $class = $filters[$key];
                (new $class($query, $key, $value))->handle();
            }
        });

        return $query;
    }
}
