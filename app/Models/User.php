<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Model implements AuthenticatableContract
{
    use HasApiTokens, HasFactory, Notifiable, Authenticatable;

    protected $fillable = [
        'name',
        'email',
        'location',
        'category',
        'password',
    ];

    public function followers()
    {
        

            return $this->belongsToMany(User::class, 'follower_user', 'follower_id', 'user_id')
            ->withTimestamps();
    }

    /**
     * The users that the user follows.
     */
    public function followings()
    {
        return $this->belongsToMany(User::class, 'follower_user', 'user_id', 'follower_id')
            ->withTimestamps();
    }

    public function follows(User $otherUser)
    {
        return $this->followings()->where('follower_id', $otherUser->id)->exists();
    }

    public function likes()
    {
        return $this->belongsToMany(Post::class, 'post_like')->withTimestamps();
    }

    /**
     * Check if the user has liked a specific post.
     *
     * @param  Post  $post
     * @return bool
     */
    public function hasLiked(Post $post)
    {
        return $this->likes()->where('post_id', $post->id)->exists();
    }

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
