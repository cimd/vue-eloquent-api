<?php

namespace Konnec\VueEloquentApi\Actions;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Konnec\VueEloquentApi\Filters\Filter;

class GetFilters
{
    /** @var Collection<string, class-string<Filter<*>>> */
    private Collection $filters;

    /**
     * @param  array<string, class-string<Filter<*>>>  $filters
     */
    public function __construct(
        array $filters,
    ) {
        $this->filters = collect($filters);
    }

    /**
     * @template TModel of Model
     *
     * @param  Builder<TModel>  $query
     * @param  array<string, mixed>  $filter
     * @return Builder<TModel>
     */
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
