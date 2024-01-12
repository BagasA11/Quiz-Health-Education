<?php

namespace App\Models;

use App\Models\Score;
use App\Models\PayGame;
use App\Models\Question;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Quiz extends Model
{
    use HasFactory;

    /**
     * Quiz 1:m Score
     *
     * @return HasMany
     */
    public function score(): HasMany
    {
        return $this->hasMany(Score::class);
    }
    /**
     * Quiz 1:m question
     *
     * @return HasMany
     */
    public function question(): HasMany
    {
        return $this->hasMany(Question::class);
    }

    /**
     * Quiz 1:m PayGame
     *
     * @return HasMany
     */
    public function payGame(): HasMany
    {
        return $this->hasMany(PayGame::class);
    }
}
