<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TopUp extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'img',
        'harga',
        'diskon',
        'cancelled',
        'massage'
    ];
    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function admin():BelongsTo
    {
        return $this->belongsTo(Admin::class);
    }
}
