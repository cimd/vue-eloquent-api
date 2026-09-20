<?php

namespace Konnec\VueEloquentApi\Filters;

use Illuminate\Database\Eloquent\Builder;

readonly class WhereEqual implements Filter
{
    public function __construct(
        private Builder $query,
        private string  $key,
        private mixed   $value
    ) {
    }

    public function handle(): Builder
    {
        return $this->query->where($this->key, $this->value);
    }
}
