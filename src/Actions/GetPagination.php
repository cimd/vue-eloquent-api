<?php

namespace Konnec\VueEloquentApi\Actions;

use Illuminate\Database\Eloquent\Builder;

class GetPagination
{
    public function __construct()
    {
    }

     public function handle(Builder $query): Builder
     {
         return $query->fastPaginate();
     }
}
