<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Score extends Model
{
    use HasFactory;
    protected $fillable = [
        'score',
        'quiz_id',
        'user_id'
    ];
    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function Quiz():BelongsTo
    {
        return $this->belongsTo(Quiz::class);
    }
    
}
