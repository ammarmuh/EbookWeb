@extends('layouts.main')

@section('container')
    <h1 class="mb-3 text-center text-info">{{ $title }}</h1>
 
    <div class="row justify-content-center mb-3">
        <div class="col-md-6">
            <form action="/">
                @if (request('genre'))
                    <input type="hidden" name="genre" value="{{ request('genre') }}">
                @endif
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search..." name="search" value="{{ request('search') }}">
                    <button class="btn btn-info text-white" type="submit">Search</button>
                  </div>
            </form>
        </div>
    </div>

    @if ($posts->count())    
    <div class="card mb-3">
        <img src="https://source.unsplash.com/1200x400?{{ $posts[0]->genre['name'] }}" class="card-img-top" alt="{{ $posts[0]->genre['name'] }}">
        <div class="card-body text-center">
          <h3 class="card-title"><a href="/{{ $posts[0]->slug }}" class="text-decoration-none">{{ $posts[0]->title }}</a></h3>
          {{-- <p class="card-text">Genre: <a href="/genrelist/{{ $posts[0]->genre['slug'] }}">{{ $posts[0]->genre['name'] }}</a></p> --}}
          <p class="card-text">Author: {{ $posts[0]->author }}</p>
          <p> {{\Carbon\Carbon::parse($posts['created_at'])->diffForHumans() }}</p>
          <a href="/{{ $posts[0]->slug }}" class="text-decoration-none btn btn-info text-white">Details</a>
        </div>
      </div>

    <div class="container">
        <div class="row">
            @foreach ($posts->skip(1) as $post)
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="position-absolute bg-dark px-3 py-2" style="background-color: rgba(0, 0, 0, 0.7)"><a href="/genrelist/{{ $post->genre['slug'] }}" class="text-white text-decoration-none">{{ $post->genre['name'] }}</a></div>
                    <img src="https://source.unsplash.com/500x400?{{ $post->genre['name'] }}" class="card-img-top" alt="{{ $post->genre['name'] }}">
                    <div class="card-body">
                        <h3 class="card-title"><a href="/{{ $post->slug }}" class="text-decoration-none">{{ $post->title }}</a></h3>
                        <p class="card-text">Author: {{ $post->author }}</p>
                        <p class="card-text"><small class="text-muted">{{ $post->created_at->diffForHumans() }}</small></p>
                        <a href="/{{ $post->slug }}" class="text-decoration-none text-white btn btn-info">Details</a>
                    </div>
                </div>    
            </div>
            @endforeach
        </div>
    </div>
    @else
        <p class="text-center fs-4">No Book Found</p>
    @endif

    <div class="d-flex justify-content-end">
        {{ $posts->links() }}
    </div>
@endsection