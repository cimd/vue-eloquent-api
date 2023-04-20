<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

class WhereHasSepStatusIn implements Filter
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
            $q->whereIn('status_id', $this->value);
        });
    }
}
