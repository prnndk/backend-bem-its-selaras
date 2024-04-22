<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Enums\RolesType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'role' => RolesType::class
    ];

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    public function review(): HasMany
    {
        return $this->hasMany(PostReview::class);
    }

    public function staff(): HasOne
    {
        return $this->hasOne(StaffDetail::class);
    }

    //isAdmin function
    public function isAdmin(): bool
    {
        return $this->role === RolesType::ADMIN;
    }

    public function isKementerian()
    {
        return $this->role === RolesType::KEMENTERIAN;
    }

    public function isMedsi()
    {
        return $this->role === RolesType::STAFF && $this->staff->kementerian->name === 'Kementerian Multimedia dan Informasi';
    }

}
