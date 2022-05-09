<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Post extends Model
{
    use HasFactory, Searchable;

    const SEARCHABLE_FIELDS = ['id','body'];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    } 
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function toSearchableArray()
    {
        return $this->only(self::SEARCHABLE_FIELDS);
    }
}
