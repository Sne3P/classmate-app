<?php

namespace App\Models;

use App\Models\Group;
use App\Models\Programme;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;


    public function group(){
        return $this->belongsTo(Group::class);
    }

    public function programme(){
        return $this->belongsTo(Programme::class);
    }

}
