<?php

namespace App\Models;
use App\Models\Quiz;
use App\Models\Option;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Question extends Model
{
    use HasFactory;
     /**
     * Question 1:m Option
     *
     * @return HasMany
     */
    public function option(): HasMany
    {
        return $this->hasMany(Option::class);
    }
     /**
     * Question m:1 Quiz
     *
     * @return BelongsTo
     */
    public function quiz(): BelongsTo
    {
        return $this->belongsTo(Quiz::class);
    }
}
