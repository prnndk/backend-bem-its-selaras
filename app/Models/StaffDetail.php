<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StaffDetail extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    public function kemenkoan(): BelongsTo
    {
        return $this->belongsTo(Kemenkoan::class);
    }

    public function kementerian(): BelongsTo
    {
        return $this->belongsTo(Kementerian::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function kedirjenan(): BelongsTo
    {
        return $this->belongsTo(Kedirjenan::class);
    }

    public function jabatan(): BelongsTo
    {
        return $this->belongsTo(Jabatan::class);
    }
}
