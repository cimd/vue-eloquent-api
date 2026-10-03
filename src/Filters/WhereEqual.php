<?php

namespace Konnec\VueEloquentApi\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * @template TModel of Model
 *
 * @implements Filter<TModel>
 */
readonly class WhereEqual implements Filter
{
    /**
     * @param  Builder<TModel>  $query
     */
    public function __construct(
        private Builder $query,
        private string $key,
        private mixed $value
    ) {}

    /**
     * @return Builder<TModel>
     */
    public function handle(): Builder
    {
        return $this->query->where($this->key, $this->value);
    }
}
