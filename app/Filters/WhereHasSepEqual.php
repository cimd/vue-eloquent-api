<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

class WhereHasSepEqual implements Filter
{
    public function __construct(
        private readonly Builder $query,
        private readonly string $key,
        private readonly mixed $value
    ) {
    }

    public function handle(): Builder
    {
        return $this->query->whereHas('sep', function ($q) {
            $q->where($this->key, $this->value);
        });
    }
}
