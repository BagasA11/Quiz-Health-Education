<?php

namespace App\Models;

use App\Models\TopUp;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Admin extends Model {
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;
    protected $guarded = ['id', 'email', 'password'];
    //user 1:m topup
    public function topup():HasMany
    {
        return $this->hasMany(TopUp::class);
    }
}
