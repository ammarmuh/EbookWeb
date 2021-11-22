<?php

namespace App\Http\Controllers;

use App\Post;
use App\Genrelist;
use Illuminate\Http\Request;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.books.index',[
            'active' => 'books',
            'posts' => Post::where("user_id", auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.books.create', [
            'active' => 'books',
            'genrelist' => Genrelist::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'title' => 'required|max:50',
            'slug' => 'required|unique:posts',
            'genrelist_id' => 'required',
            'author' => 'required|max:50',
            'publisher' => 'required|max:20',
            'image' => "image|file|max:1024"
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('/post-images');
        }

        $validatedData['user_id'] = auth()->user()->id;

        Post::create($validatedData);

        return redirect('/dashboard/books')->with('success', 'New Book has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('dashboard.books.show', [
            "post" => $post,
            'active' => 'books'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::where('id',$id)->first();
        
        
        return view('dashboard.books.edit', [
            'post' => $post,
            'active' => 'books',
            'genrelist' => Genrelist::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Post::find($id);
        $validatedData = $request->validate([
            'title' => 'required|max:50',
            'slug' => 'required|unique:posts',
            'genrelist_id' => 'required',
            'author' => 'required|max:50',
            'publisher' => 'required|max:20',
            'image' => "image|file|max:1024"
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('/post-images');
        }

        $validatedData['user_id'] = auth()->user()->id;
        $data->title = $request->title;
        $data->slug = $request->slug;
        $data->genrelist_id = $request->genrelist_id;
       
        $data->author = $request->author;
        $data->publisher = $request->publisher;
        $data->save();


        return redirect('/dashboard/books')->with('success', 'Book has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post,$id)
    {
        Post::destroy($id);

        return redirect('/dashboard/books')->with('success', 'The Book Has Been Deleted :(');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}