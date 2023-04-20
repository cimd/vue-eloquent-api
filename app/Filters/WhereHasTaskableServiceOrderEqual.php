<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

class WhereHasTaskableServiceOrderEqual implements Filter
{
    public function __construct(
        private readonly Builder $query,
        private readonly string $key,
        private readonly mixed $value
    ) {
    }

    public function handle(): Builder
    {
        return $this->query->whereHas('taskable', function ($q) {
            $q->where($this->key, $this->value);
        });
    }
}
