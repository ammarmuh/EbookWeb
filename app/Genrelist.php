<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;

class Genrelist extends Model
{
    protected $guarded = ['id'];

    public function post() 
    {
        return $this->hasMany(Post::class);
    }
}
