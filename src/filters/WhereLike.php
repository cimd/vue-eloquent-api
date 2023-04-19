<?php

namespace Modules\Application\Models\Filters;

use Illuminate\Database\Eloquent\Builder;

class WhereLike
{
    public function __construct(
        private readonly Builder $query,
        private readonly string $key,
        private readonly mixed $value
    ) {
    }

    public function handle(): Builder
    {
        return $this->query->where($this->key, 'like', '%' . $this->value . '%');
    }
}
