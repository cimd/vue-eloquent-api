<?php

namespace Konnec\VueEloquentApi\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Konnec\VueEloquentApi\Actions\GetFilters;
use Konnec\VueEloquentApi\Actions\GetPagination;
use Konnec\VueEloquentApi\Actions\GetPaginationMeta;
use Konnec\VueEloquentApi\Actions\GetRelations;
use Konnec\VueEloquentApi\Actions\GetSelection;
use Konnec\VueEloquentApi\Actions\GetSorting;

trait EloquentApi
{
    public function scopeApiQuery(Builder $query, Request $request, $builder = false): array|Builder
    {
        $meta = null;

        if ($request->has('fields')) {
            $query = (new GetSelection())->handle($query, $request->get('fields'));
        }

        if ($request->has('filter')) {
            $query = (new GetFilters($this->filters))->handle($query, $request->get('filter'));
        }

        if ($request->has('include')) {
            $query = (new GetRelations())->handle($query, $request->get('include'));
        }

        if ($request->has('sort')) {
            $query = (new GetSorting())->handle($query, $request->get('sort'));
        }

        if ($request->has('paginate')) {
            $meta = [
                'paginate' => (new GetPaginationMeta())->handle($query, $request->get('paginate')),
            ];
            $query = (new GetPagination())->handle($query, $request->get('paginate'));
        }

        if ($builder) {
            return $query;
        }

        if ($request->has('append')) {
            return array_merge(
                ['data' => $query->get()->append($request->get('append'))],
                isset($meta) ? ['meta' => $meta] : [],
            );
        }

        return array_merge(
            ['data' => $query->get()],
            isset($meta) ? ['meta' => $meta] : [],
        );
    }

    public function scopeApiFields(Builder $query, Request $request): Builder
    {
        if ($request->has('fields')) {
            $query = (new GetSelection())->handle($query, $request->get('fields'));
        }

        return $query;
    }

    public function scopeApiFilter(Builder $query, Request $request): Builder
    {
        if ($request->has('filter')) {
            $query = (new GetFilters($this->filters))->handle($query, $request->get('filter'));
        }

        return $query;
    }

    public function scopeApiInclude(Builder $query, Request $request): Builder
    {
        if ($request->has('include')) {
            $query = (new GetRelations())->handle($query, $request->get('include'));
        }

        return $query;
    }

    public function scopeApiSort(Builder $query, Request $request): Builder
    {
        if ($request->has('sort')) {
            $query = (new GetSorting())->handle($query, $request->get('sort'));
        }

        return $query;
    }

    public function scopeApiPaginate(Builder $query, Request $request): array
    {
        if ($request->has('paginate')) {
            $meta = [
                'paginate' => (new GetPaginationMeta())->handle($query, $request->get('paginate')),
            ];
            $query = (new GetPagination())->handle($query, $request->get('paginate'));
        }

        return [
            'query' => $query,
            'meta' => $meta ?? null,
        ];
    }

    public function scopeApiAppend(Builder $query, Request $request): Builder
    {
        if ($request->has('append')) {
            return $query->get()->append($request->get('append'));
        }

        return $query;
    }
}
