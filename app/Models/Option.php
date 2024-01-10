<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Option extends Model
{
    use HasFactory;
    protected $fillable = [
        'opt',
        'detail_opt',
        'color'
    ];
    public function question():BelongsTo
    {
        return $this->belongsTo(Question::class);
    }
}
