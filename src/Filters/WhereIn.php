<?php

namespace Konnec\VueEloquentApi\Filters;

use Illuminate\Database\Eloquent\Builder;

readonly class WhereIn implements Filter
{
    public function __construct(
        private Builder $query,
        private string  $key,
        private array   $value
    ) {
    }

    public function handle(): Builder
    {
        return $this->query->whereIn($this->key, $this->value);
    }
}
