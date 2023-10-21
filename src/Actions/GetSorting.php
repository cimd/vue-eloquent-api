<?php

namespace Konnec\VueEloquentApi\Actions;

use Illuminate\Database\Eloquent\Builder;

class GetSorting
{
    public function handle(Builder $query, string $relations): Builder
    {
        $sortingArray = explode(',', $relations);
        foreach ($sortingArray as $sorting) {
            $lastChar = substr($sorting, -1);
            $sortOrder = 'asc';
            if ($lastChar === '-') {
                $sortOrder = 'desc';
                $sorting = substr($sorting, 0, -1);
            } elseif ($lastChar === '+') {
                $sorting = substr($sorting, 0, -1);
            }
            $query->orderBy($sorting, $sortOrder);
        }

        return $query;
    }
}
