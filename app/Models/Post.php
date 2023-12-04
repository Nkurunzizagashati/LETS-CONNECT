<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable=[
        'title',
        'description',
        'user_id',
        'file_path',
        'post_category',
    ];

    public function comments() {
        return $this->hasMany(Comment::class);
    }
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->belongsToMany(User::class, 'post_like')->withTimestamps();
    }
}
