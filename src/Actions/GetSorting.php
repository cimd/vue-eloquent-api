<?php

namespace Konnec\VueEloquentApi\Actions;

use Illuminate\Database\Eloquent\Builder;

class GetSorting
{
    public function __construct()
    {
    }

    public function handle(Builder $query, mixed $relations): Builder
    {
        $sortingArray = explode(',', $relations);
        foreach ($sortingArray as $sorting) {
            $query->orderBy($sorting);
        }

        return $query;
    }
}
