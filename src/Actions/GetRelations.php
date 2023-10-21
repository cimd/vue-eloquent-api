<?php

namespace Konnec\VueEloquentApi\Actions;

use Illuminate\Database\Eloquent\Builder;

class GetRelations
{
    public function handle(Builder $query, mixed $relations): Builder
    {
        $relationsArray = explode(',', (string) $relations);

        return $query->with($relationsArray);
    }
}
