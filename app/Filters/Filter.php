<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

interface Filter
{
//    public function __construct(
//        private readonly Builder $query,
//        private readonly string $key,
//        private readonly array $value
//    ) {
//    }

    public function handle(): Builder;
}
