<?php

namespace Konnec\VueEloquentApi\Actions;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;

class GetPagination
{
    public function handle(Builder $query): LengthAwarePaginator
    {
        return $query->fastPaginate();
    }
}
