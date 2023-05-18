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
     * @param array $params
     */
    public function scopeFilter(Builder $query, array $params)
    {
        $query->when($params['search'] ?? false, fn($query, $param) =>
            $query->where(fn($query) =>
            $query
                ->where('title', 'like', "%$param%")
                ->orWhere('body', 'like', "%$param%")
        ));

        $query->when($params['category'] ?? false, fn($query, $param) => $query->whereHas('category', fn($query) => $query->where('slug', $param)));

        $query->when($params['author'] ?? false, fn($query, $param) => $query->whereHas('author', fn($query) => $query->where('username', $param)));
    }
}
