<?php

use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

trait Schemable
{
    public function scopeSchema(Builder $query): array
    {
        return [
            'casts' => $this->getCasts(),
            'columns' => Schema::getColumnListing($this->getTable()),
            'filters' => $this->filters ?: [],
            'fillable' => $this->getFillable(),
            'guarded' => $this->getGuarded(),
            'key' => $this->getKeyName(),
            'relations' => $this->getRelations(),
            'scopes' => $this->getGlobalScopes(),
            'appends' => $this->getAppends(),
            'attributes' => $this->getAttributes(),
            'table' => $this->getTable(),
            'model' => $this->getModel(),
            'observables' => $this->getObservableEvents(),
            'visible' => $this->getVisible(),
            'hidden' => $this->getHidden(),
            'eager_loads' => $this->getEagerLoads(),
            'schema' => DB::select(
                (DB::raw('SHOW COLUMNS FROM ' . $this->getTable()))->getValue(DB::connection()->getQueryGrammar())
            ),
        ];
    }
}
