<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Genrelist;
use App\Http\Controllers;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $title = '';
        if (request('genre')) {
            $genre = Genrelist::firstWhere('slug', request('genre'));
            $title = ' in ' . $genre->name;
        }

        return view('home', [
            "title" => "See your favourite Book" . $title,
            'active' => 'home',
            "posts" => Post::latest()->filter(request(['search', 'genre']))->paginate(7)
        ]);
    }

    public function show(Post $post)
    {
        return view('detail', [
            "title" => $post->title,
            'active' => 'home',
            "post" => $post
        ]);
    }
}