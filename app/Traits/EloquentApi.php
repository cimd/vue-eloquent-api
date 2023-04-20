<?php

namespace App\Traits;

use App\Actions\GetFilters;
use App\Actions\GetRelations;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

trait EloquentApi
{
    public function scopeApiQuery(Builder $query, Request $request): Builder
    {
//        Log::debug('Querying API', [
//            'query' => $query->toSql(),
//            'request' => $request->toArray(),
//            'filter' => $request->input('filter'),
//            'filter-get' => $request->get('filter'),
//        ]);
        if ($request->has('filter')) {
            $query = (new GetFilters($this->filters))->handle($query, $request->get('filter'));
        }

        if ($request->has('include')) {
            $query = (new GetRelations())->handle($query, $request->get('include'));
        }
//        $request->each(function ($value, $key) use ($query, $filters) {
//            if (isset($value)) {
//                if (isset($filters[$key])) {
//                    $class = $filters[$key];
//                    (new $class($query, $key, $value))->handle();
//                }
//            }
//        });

        return $query;
    }
}
