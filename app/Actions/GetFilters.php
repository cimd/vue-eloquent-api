<?php

namespace App\Actions;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;

class GetFilters
{
    private Collection $filter;

    public function __construct(
        private readonly Builder $query,
        array $filter,
    ) {
        $this->filter = collect($filter);
    }

    public function handle(): Builder
    {
        // https://www.jsonapi.net/usage/reading/filtering.html
//        https://discuss.jsonapi.org/t/filtering-querying-deep-relationships-a-proposal-for-a-syntax/1746/4

//        [
//            '=', '<>',
//            '>', '>=', '<', '<=',
//            'STARTS_WITH', 'CONTAINS', 'ENDS_WITH',
//            'IN', 'NOT IN',
//            'BETWEEN', 'NOT BETWEEN',
//            'IS NULL', 'IS NOT NULL',
//        ];
        //= eq
        //<> neq
        //> gt
        //>= gte
        //< lt
        //<= lte

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

        Log::debug('Getting filters', [
            'query' => $this->query->toSql(),
            'filter' => $this->filter->toArray(),
        ]);

        return $this->query;
    }
}
