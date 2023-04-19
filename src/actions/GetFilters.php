<?php

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

class GetFilters
{
    public function __construct(
        private readonly Builder $query,
        private readonly Collection $filter,
    ) {
        //
    }

    public function handle(): Builder
    {
        Log::debug('Getting filters', [
            'query' => $this->query,
            'filters' => $this->filter->toArray(),
        ]);

        return $this->query;
    }
}
