<?php

namespace App\Models;

use App\Models\Post;
use App\Models\Group;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Programme extends Model
{
    use HasFactory;

    public function Group(){
        return $this->belongsTo(Group::class);
    }
    public function post(){
        return $this->hasMany(Post::class);
    }
}
