<?php

namespace Konnec\Examples\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;
use Konnec\VueEloquentApi\Filters\WhereEqual;
use Konnec\VueEloquentApi\Filters\WhereIn;
use Konnec\VueEloquentApi\Filters\WhereLike;
use Konnec\VueEloquentApi\Traits\EloquentApi;

class Post extends Model
{
    use EloquentApi;
    use HasFactory;

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'readers_id' => 'array',
    ];

    protected array $filters = [
        'id' => WhereIn::class,
        'author_id' => WhereEqual::class,
        'title' => WhereLike::class,
    ];

    public function getShortTitleAttribute(): string
    {
        return Str::limit($this->attributes['title'], 10);
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
}
