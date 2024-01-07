<?php

namespace Konnec\VueEloquentApi\Actions;

use Illuminate\Database\Eloquent\Builder;

class GetPaginationMeta
{
    public function handle(Builder $query, array $pagination): array
    {
//        $paginationQuery = $query->dumpRawSql();
        $paginationQuery = (new GetPagination())->handle(clone $query, $pagination);
        return [
            'page' => $pagination['page'],
            'pageSize' => $pagination['pageSize'],
            'pageCount' => $paginationQuery->get()->count(),
            'totalPages' => ceil($query->count() / $pagination['pageSize']),
        ];
    }
}


//'pagination' => [
//    'page' => $request->get('pagination')['page'],
//    'pageSize' => $request->get('pagination')['pageSize'],
//    'pageCount' => null,
//    'total' => null,
//],
