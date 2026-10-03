<?php

namespace Konnec\VueEloquentApi\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * @template TModel of Model
 */
interface Filter
{
    /**
     * @return Builder<TModel>
     */
    public function handle(): Builder;
}
