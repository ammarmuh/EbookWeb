<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Genrelist;

class Post extends Model
{

    protected $guarded = ['id'];
    protected $with = ['genre'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query->where(function($query) use ($search) {
                   $query->where('title', 'like', '%' . $search . '%');
             });
         });

        $query->when($filters['genre'] ?? false, function($query, $genre){
            return $query->whereHas('genre', function($query) use($genre){
                   $query->where('slug', $genre);
            });
        });
    }

    public function genre()
    {
        return $this->belongsTo(Genrelist::class);
    }


    // public function author()
    // {
    //     return $this->belongsTo(User::class, 'user_id');
    // }

    public function getRouteKeyName()
    {
        return 'slug';
    }

}
