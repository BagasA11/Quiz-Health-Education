<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Score;
use App\Models\PayGame;
use App\Models\Transaction;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'bio',
        'avatar',
        'credit'
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
    ];

    /**
     * User 1:m Score
     *
     * @return HasMany
     */
    public function score(): HasMany
    {
        return $this->hasMany(Score::class);
    }

    /**
     * User 1:m Transaction
     *
     * @return HasMany
     */
    public function transact(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }

    /**
     * User 1:m PayGame
     *
     * @return HasMany
     */
    public function payGame(): HasMany
    {
        return $this->hasMany(PayGame::class);
    }
}
