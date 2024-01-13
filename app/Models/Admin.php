<?php

namespace App\Models;

use App\Models\Transaction;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Admin extends Model
{
    use HasFactory, HasApiTokens, Notifiable;
    protected $fillable = ['email', 'password', 'created_at'];
    public $timestamps = false;
    /**
     * Admin 1:m Transaction
     *
     * @return HasMany
     */
    public function transact(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }
}
