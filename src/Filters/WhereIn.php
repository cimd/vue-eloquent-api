<?php

namespace Konnec\VueEloquentApi\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * @template TModel of Model
 *
 * @implements Filter<TModel>
 */
readonly class WhereIn implements Filter
{
    /**
     * @param  Builder<TModel>  $query
     * @param  array<int, mixed>  $value
     */
    public function __construct(
        private Builder $query,
        private string $key,
        private array $value
    ) {}

    /**
     * @return Builder<TModel>
     */
    public function handle(): Builder
    {
        return $this->query->whereIn($this->key, $this->value);
    }
}
