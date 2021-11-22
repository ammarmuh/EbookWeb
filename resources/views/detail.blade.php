@extends('layouts/main')

@section('container')

    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-8">
                @if ($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->genre['name'] }}" class="img-fluid">
                @else    
                <img src="https://source.unsplash.com/1200x400?{{ $post->genre['name'] }}" alt="{{ $post->genre['name'] }}" class="img-fluid">
                @endif
                <h1 class="mb-3 mt-3">{{ $post->title }}</h1>
                {{-- <p>Genre: <a href="/genrelist/{{ $post->genre['slug'] }}" class="text-decoration-none">{{ $post->genre['name'] }}</a></p> --}}
                <p>Author: {{ $post->author }}</p>
                <p>Publisher: {{ $post->publisher }}</p>
                <p class="card-text"><small class="text-muted">{{ $post->created_at->diffForHumans() }}</small></p>
                @auth
                <a href="/dashboard/books" class="mt-3 btn btn-info text-white">Back to Books Dashboard</a>
                <a href="/" class="mt-3 btn btn-info text-white">Back to Home</a>
                @else
                <a href="/" class="mt-3 btn btn-info text-white">Back to Home</a>
                @endauth
            </div>
        </div>
    </div>
    
@endsection