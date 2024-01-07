<?php

namespace Konnec\VueEloquentApi\Actions;

use Illuminate\Database\Eloquent\Builder;

class GetPagination
{
    public function handle(Builder $query, array $pagination): Builder
    {
        $offset = $pagination['pageSize'] * ($pagination['page'] - 1);
        return $query->limit($pagination['pageSize'])->offset($offset);
    }
}
