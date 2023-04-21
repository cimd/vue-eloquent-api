<?php

namespace Konnec\VueEloquentApi\Filters;

use Illuminate\Database\Eloquent\Builder;

class WhereHasSepIn implements Filter
{
    public function __construct(
        private readonly Builder $query,
        private readonly string $key,
        private readonly array $value
    ) {
    }

    public function handle(): Builder
    {
        return $this->query->whereHas('sep', function ($q) {
            $q->whereIn($this->key, $this->value);
        });
    }
}
