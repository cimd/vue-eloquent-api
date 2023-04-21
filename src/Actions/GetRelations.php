<?php

namespace Konnec\VueEloquentApi\Actions;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Log;

class GetRelations
{
    public function __construct()
    {
    }

     public function handle(Builder $query, mixed $relations): Builder
     {
//         $relations = collect($relations);

//        Log::debug('Getting filters', [
//            'query' => $query->toSql(),
//            'filters' => $this->filters->toArray(),
//            'filter' => $filter->toArray(),
//        ]);

         $relationsArray = explode(',', $relations);

         Log::debug('Final Relation', [
             'query' => $query->toSql(),
             'relations' => $relations,
             'array' => $relationsArray,
         ]);

         return $query->with($relationsArray);
     }
}
