<?php

namespace App\Models;

use App\Models\Option;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Question extends Model
{
    use HasFactory;
    protected $fillable = [
        'question',
        'answer',
        'img'
    ];
    // Eloquent Relational Model Instance
    //question 1:m option
    public function question():HasMany
    {
        return $this->hasMany(Option::class);
    }
    public function Quiz():BelongsTo
    {
        return $this->belongsTo(Quiz::class);
    }
}
