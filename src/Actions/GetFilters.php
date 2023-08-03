<?php

namespace Konnec\VueEloquentApi\Actions;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

class GetFilters
{
    private Collection $filters;

    public function __construct(
        array $filters,
    ) {
        $this->filters = collect($filters);
    }

    public function handle(Builder $query, array $filter): Builder
    {
        $filter = collect($filter);
        $filters = $this->filters;

        $filter->each(function ($value, $key) use ($query, $filters) {
            if (isset($value)) {
                if (isset($filters[$key])) {
                    $class = $filters[$key];
                    (new $class($query, $key, $value))->handle();
                }
            }
        });

        return $query;

        // https://www.jsonapi.net/usage/reading/filtering.html
        // https://discuss.jsonapi.org/t/filtering-querying-deep-relationships-a-proposal-for-a-syntax/1746/4

        //        [
        //            '=', '<>',
        //            '>', '>=', '<', '<=',
        //            'STARTS_WITH', 'CONTAINS', 'ENDS_WITH',
        //            'IN', 'NOT IN',
        //            'BETWEEN', 'NOT BETWEEN',
        //            'IS NULL', 'IS NOT NULL',
        //        ];

        //    Equals	    Displays the pivot table that matches with the text.
        //    DoesNotEquals	Displays the pivot table that does not match with the given text.
        //    BeginWith	    Displays the pivot table that begins with text.
        //    DoesNotBeginWith	Displays the pivot table that does not begins with text.
        //    EndsWith	    Displays the pivot table that ends with text.
        //    DoesNotEndsWith	Displays the pivot table that does not ends with text.
        //    Contains	    Displays the pivot table that contains text.
        //    DoesNotContains	Displays the pivot table that does not contain text.
        //    GreaterThan	Displays the pivot table when the text is greater.
        //    GreaterThanOrEqualTo	Displays the pivot table when the text is greater than or equal.
        //    LessThan	    Displays the pivot table when the text is lesser.
        //    LessThanOrEqualTo	Displays the pivot table when the text is lesser than or equal.
        //    Between	    Displays the pivot table that records between the start and end text.
        //    NotBetween	Displays the pivot table that does not record between the start and end text.
    }
}
