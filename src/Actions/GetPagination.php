<?php

namespace Konnec\VueEloquentApi\Actions;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class GetPagination
{
    /**
     * @template TModel of Model
     *
     * @param  Builder<TModel>  $query
     * @param  array<string, mixed>  $pagination
     * @return Builder<TModel>
     */
    public function handle(Builder $query, array $pagination): Builder
    {
        $pageSize = $pagination['pageSize'] ?? 15;
        $offset = $pageSize * ($pagination['page'] - 1);

        return $query->limit($pageSize)->offset($offset);
    }
}
