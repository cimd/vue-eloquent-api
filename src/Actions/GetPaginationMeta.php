<?php

namespace Konnec\VueEloquentApi\Actions;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class GetPaginationMeta
{
    /**
     * @template TModel of Model
     *
     * @param  Builder<TModel>  $query
     * @param  array<string, mixed>  $pagination
     * @return array<string, int|float>
     */
    public function handle(Builder $query, array $pagination): array
    {
        $pageSize = $pagination['pageSize'] ?? 15;
        $paginationQuery = (new GetPagination)->handle(clone $query, $pagination);

        return [
            'page' => (int) $pagination['page'],
            'pageSize' => (int) $pageSize,
            'pageCount' => $paginationQuery->count(),
            'totalPages' => ceil($query->count() / (int) $pageSize),
        ];
    }
}
