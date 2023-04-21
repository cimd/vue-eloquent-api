<?php

namespace Konnec\VueEloquentApi\Filters;

use Illuminate\Database\Eloquent\Builder;

interface Filter
{
    public function handle(): Builder;
}
