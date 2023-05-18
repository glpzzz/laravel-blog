<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;

    protected $with = ['category', 'author'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * @param Builder $query
     * @param string|null $param
     * @throws \Exception
     */
    public function scopeFilter(Builder $query, ?string $param)
    {
        $query->when($param ?? null, fn($query, $param) => $query
            ->where('title', 'like', "%$param%")
            ->orWhere('body', 'like', "%$param%")
        );
    }
}
