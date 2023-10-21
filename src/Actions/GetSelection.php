<?php

namespace Konnec\VueEloquentApi\Actions;

use Illuminate\Database\Eloquent\Builder;

class GetSelection
{
    public function handle(Builder $query, mixed $selection): Builder
    {
        $selectionArray = explode(',', (string) $selection);

        return $query->select(...$selectionArray);
    }
}
