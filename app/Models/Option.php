<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $fillable = [
        'value',
        'question_id',
    ];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
