<?php

namespace Konnec\VueEloquentApi\Actions;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class GetSelection
{
    /**
     * @template TModel of Model
     *
     * @param  Builder<TModel>  $query
     * @return Builder<TModel>
     */
    public function handle(Builder $query, mixed $selection): Builder
    {
        $selectionArray = explode(',', (string) $selection);

        return $query->select(...$selectionArray);
    }
}
