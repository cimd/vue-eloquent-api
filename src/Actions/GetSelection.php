<?php

namespace Konnec\VueEloquentApi\Actions;

use Illuminate\Database\Eloquent\Builder;

class GetSelection
{
    public function __construct()
    {
    }

     public function handle(Builder $query, mixed $selection): Builder
     {
         $selectionArray = explode(',', $selection);

         return $query->select(...$selectionArray);
     }
}
