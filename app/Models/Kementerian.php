<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Kementerian extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'program_kerja',
        'description',
        'kemenkoan_id'
    ];

    protected $casts = [
        'program_kerja' => 'array'
    ];

    public function kemenkoan(): BelongsTo
    {
        return $this->belongsTo(Kemenkoan::class);
    }

    public function kedirjenan(): HasMany
    {
        return $this->hasMany(Kedirjenan::class);
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    public function staffs(): HasMany
    {
        return $this->hasMany(StaffDetail::class);
    }

    public function progres(): HasOne
    {
        return $this->hasOne(Progress::class);
    }
}
