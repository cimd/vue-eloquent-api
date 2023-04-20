<?php

namespace App\Models;

use App\Filters\WhereEqual;
use App\Traits\EloquentApi;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;
    use EloquentApi;

    protected array $protected = [
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'readers_id' => 'array',
    ];

    protected array $filters = [
        'author_id' => WhereEqual::class,
    ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function readers(): HasMany
    {
        return $this->hasMany(User::class, 'id', 'readers_id');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
}
