@extends('layouts.main')

@section('container')
    <h1 class="mb-5">{{ $title }}</h1>

    @foreach ($posts as $post)
    <div class="col-md-4 mb-3">
        <div class="card">
            <div class="position-absolute bg-dark px-3 py-2" style="background-color: rgba(0, 0, 0, 0.7)"><a href="/detail/{{ $post->slug }}" class="text-white text-decoration-none">{{ $post->title }}</a></div>
            <img src="https://source.unsplash.com/500x400?{{ $post->name }}" class="card-img-top" alt="{{ $post->name }}">
            <div class="card-body">
                <h3 class="card-title"><a href="/{{ $post->slug }}" class="text-decoration-none">{{ $post->title }}</a></h3>
                <p class="card-text">Author: {{ $post->author }}</p>
                <p class="card-text"><small class="text-muted">{{ $post->created_at->diffForHumans() }}</small></p>
                <a href="/{{ $post->slug }}" class="text-decoration-none btn btn-info">Details</a>
            </div>
        </div>    
    </div>
    @endforeach
@endsection