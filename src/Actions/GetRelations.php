<?php

namespace Konnec\VueEloquentApi\Actions;

use Illuminate\Database\Eloquent\Builder;

class GetRelations
{
    public function __construct()
    {
    }

    public function handle(Builder $query, mixed $relations): Builder
    {
        $relationsArray = explode(',', $relations);

        return $query->with($relationsArray);
    }
}
