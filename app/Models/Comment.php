<?php

namespace App\Models;

use App\Filters\WhereEqual;
use App\Traits\EloquentApi;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;
    use EloquentApi;

    protected array $protected = [
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'post_id' => 'integer',
        'user_id' => 'integer',
    ];

    protected array $filters = [
        'post_id' => WhereEqual::class,
    ];

    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }
}
