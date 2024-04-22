<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kedirjenan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function kementerian(): BelongsTo
    {
        return $this->belongsTo(Kementerian::class);
    }

    public function staff(): HasMany
    {
        return $this->hasMany(StaffDetail::class);
    }
}
