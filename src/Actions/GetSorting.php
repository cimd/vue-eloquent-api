<?php

namespace Konnec\VueEloquentApi\Actions;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class GetSorting
{
    /**
     * @template TModel of Model
     *
     * @param  Builder<TModel>  $query
     * @return Builder<TModel>
     */
    public function handle(Builder $query, string $relations): Builder
    {
        $sortingArray = explode(',', $relations);
        foreach ($sortingArray as $sorting) {
            $firstChar = substr($sorting, 0, 1);
            $sortOrder = 'asc';
            if ($firstChar === '-') {
                $sortOrder = 'desc';
                $sorting = substr($sorting, 1);
            } elseif ($firstChar === '+') {
                $sorting = substr($sorting, 1);
            }
            $query->orderBy($sorting, $sortOrder);
        }

        return $query;
    }
}
