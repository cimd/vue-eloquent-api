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
    public function scopeApiQuery(Builder $query, Request $request): array
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

        if ($request->has('append')) {
            return [
                'data' => $query->get()->append($request->get('append')),
                'meta' => $meta,
            ];
        }

        return [
            'data' => $query->get(),
            'meta' => $meta,
        ];
    }
}
