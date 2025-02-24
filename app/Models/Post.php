<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;


    protected $fillable = [
        'title',
        'description',
        'image',
        'category_id',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    public function tag()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }

    public function like()
    {
        return $this->hasMany(Like::class, 'post_id');
    }

    public function image()
    {
        if ($this->image) {
            return Storage::url($this->image);
        }
        return asset('default.png');
    }
}
