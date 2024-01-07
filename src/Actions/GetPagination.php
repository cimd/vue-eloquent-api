<?php

namespace Konnec\VueEloquentApi\Actions;

use Illuminate\Database\Eloquent\Builder;

class GetPagination
{
    public function handle(Builder $query, array $pagination): Builder
    {
        $pageSize = $pagination['pageSize'] ?? 15;
        $offset = $pageSize * ($pagination['page'] - 1);

        return $query->limit($pageSize)->offset($offset);
    }
}
