<?php

namespace Konnec\VueEloquentApi\Filters;

use Illuminate\Database\Eloquent\Builder;

class WhereEqual implements Filter
{
    public function __construct(
        private readonly Builder $query,
        private readonly string $key,
        private readonly mixed $value
    ) {
    }

    public function handle(): Builder
    {
        return $this->query->where($this->key, $this->value);
    }
}
