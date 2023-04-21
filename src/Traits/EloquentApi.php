<?php

namespace Konnec\VueEloquentApi\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Konnec\VueEloquentApi\Actions\GetFilters;
use Konnec\VueEloquentApi\Actions\GetPagination;
use Konnec\VueEloquentApi\Actions\GetRelations;
use Konnec\VueEloquentApi\Actions\GetSorting;

trait EloquentApi
{
    public function scopeApiQuery(Builder $query, Request $request): Collection|LengthAwarePaginator
    {
        if ($request->has('filter')) {
            $query = (new GetFilters($this->filters))->handle($query, $request->get('filter'));
        }

        if ($request->has('include')) {
            $query = (new GetRelations())->handle($query, $request->get('include'));
        }

        if ($request->has('sort')) {
            $query = (new GetSorting())->handle($query, $request->get('sort'));
        }

        if ($request->has('page')) {
            $query = (new GetPagination())->handle($query);

            return $query;
        }

        return $query->get();
    }
}
