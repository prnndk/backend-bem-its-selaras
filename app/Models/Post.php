<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'published_at' => 'datetime',
        'is_published' => 'boolean',
        'is_active' => 'boolean'
    ];

    public function kementerian(): BelongsTo
    {
        return $this->belongsTo(Kementerian::class);
    }

    public function kemenkoan(): BelongsTo
    {
        return $this->belongsTo(Kemenkoan::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(PostReview::class);
    }
}
