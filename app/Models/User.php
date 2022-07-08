<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $path = '/storage/profile_images/';

    public function getPictureAttribute($picture) {

        return $this->path . $picture;

    }

    protected $path2 = "/img/";

    public function getRandomAttribute($picture) {
        return $this->path2 . $picture;

    }

    protected $guarded = [];

    public function posts() {
        return $this->hasMany(Post::class);
    }

    public function likes() {
        return $this->hasMany(Like::class);
    }

    public function receivedLikes() {
        return $this->hasManyThrough(Like::class, Post::class);
    }

    public function quotes() {
        return $this->hasMany(Quote::class);
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    //     'username',
    // ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
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
    ];
}
