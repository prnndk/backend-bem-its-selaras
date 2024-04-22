<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Kemenkoan extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description'
    ];

    public function staffs(): HasMany
    {
        return $this->hasMany(StaffDetail::class);
    }

    public function kementerian(): HasMany
    {
        return $this->hasMany(Kementerian::class);
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    public function progres(): HasOne
    {
        return $this->hasOne(Progress::class);
    }
}
