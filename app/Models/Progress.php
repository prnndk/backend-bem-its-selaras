<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Progress extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function kementerian(): BelongsTo
    {
        return $this->belongsTo(Kementerian::class);
    }

    public function kemenkoan(): BelongsTo
    {
        return $this->belongsTo(Kemenkoan::class);
    }
}
