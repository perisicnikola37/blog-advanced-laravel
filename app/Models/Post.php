<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function likes() {
        return $this->hasMany(Like::class);
    }

    public function likedBy(User $user) {

        return $this->likes->contains('user_id', $user->id);

    }

    // Added inside "PostPolicy"
    // public function ownedBy(User $user) {

    //     return $user->id == $post->user_id;

    // }

}
