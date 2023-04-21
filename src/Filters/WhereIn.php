<?php

namespace Konnec\VueEloquentApi\Filters;

use Illuminate\Database\Eloquent\Builder;

class WhereIn implements Filter
{
    public function __construct(
        private readonly Builder $query,
        private readonly string $key,
        private readonly array $value
    ) {
    }

    public function handle(): Builder
    {
        return $this->query->whereIn($this->key, $this->value);
    }
}
