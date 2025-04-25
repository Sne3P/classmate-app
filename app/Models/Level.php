<?php

namespace App\Models;

use App\Models\User;
use App\Models\Group;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Level extends Model
{
    use HasFactory;
    public function user(){
        return $this->hasMany(User::class);
    }

    public function group(){
        return $this->hasMany(Group::class);
    }
}
