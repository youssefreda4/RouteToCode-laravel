<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{

    protected $fillable = [
        'question',
        'user_id',
        'category_id',
    ];

    public function option()
    {
        return $this->hasMany(Option::class);
    }
}
