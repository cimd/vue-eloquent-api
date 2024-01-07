<?php

namespace Konnec\VueEloquentApi\Actions;

use Illuminate\Database\Eloquent\Builder;

class GetPaginationMeta
{
    public function handle(Builder $query, array $pagination): array
    {
        $pageSize = $pagination['pageSize'] ?? 15;
        $paginationQuery = (new GetPagination())->handle(clone $query, $pagination);

        return [
            'page' => $pagination['page'],
            'pageSize' => $pageSize,
            'pageCount' => $paginationQuery->get()->count(),
            'totalPages' => ceil($query->count() / $pageSize),
        ];
    }
}
