<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Quiz extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'img',
        'isfree',
        'price',
        'dicount'
    ];
    /*Eloquent Relational Model */
    //quiz 1:M score
    public function score():HasMany
    {
        return $this->hasMany(Score::class);
    }
    //quiz 1:m question
    public function question():HasMany
    {
        return $this->hasMany(Question::class);
    }
}
