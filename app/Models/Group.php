<?php

namespace App\Models;

use App\Models\Post;
use App\Models\User;
use App\Models\Level;
use App\Models\Programme;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Group extends Model
{
    use HasFactory;
    public function level(){
        return $this->belongsTo(Level::class);
    }

    public function users(){
        return $this->belongsToMany(User::class);
    }

    public function programmes(){
        return $this->hasMany(Programme::class);
    }

    public function post(){
        return $this->hasMany(Post::class);
    }


}
