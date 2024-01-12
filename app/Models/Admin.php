<?php

namespace App\Models;

use App\Models\Transaction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Admin extends Model
{
    use HasFactory;
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
