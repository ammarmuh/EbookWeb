@extends('dashboard.layouts.main')
@section('container')
<div class="container">
        <div class="row my-5">
            <div class="col-lg-8">
                <img src="https://source.unsplash.com/1200x400?{{ $post->genre['name'] }}" class="mt-3" alt="{{ $post->genre['name'] }}" class="img-fluid">
                <h1 class="mb-3 mt-3">{{ $post->title }}</h1>
                {{-- <p>Genre: <a href="/genrelist/{{ $post->genre['slug'] }}" class="text-decoration-none">{{ $post->genre['name'] }}</a></p> --}}
                <p>Author: {{ $post['author'] }}</p>
                <p>Publisher: {{ $post['publisher'] }}</p>
                <p class="card-text"><small class="text-muted">{{\Carbon\Carbon::parse($post['created_at'])->diffForHumans() }}</small></p>
                <a href="/" class="d-block mt-3">Back to Home</a>
            </div>
        </div>
    </div>

@endsection

{{-- 

    <p> {{\Carbon\Carbon::parse($post['created_at'])->diffForHumans() }}</p> 

<div class="container">
    <div class="row my-3">
        <div class="col-lg-8">
            <a href="/dashboard/books" class="btn btn-success mb-3"><span data-feather="arrow-left"> Back</span></a>
            <a href="" class="btn btn-warning mb-3"><span data-feather="edit"> Edit</span></a>
            <a href="" class="btn btn-danger mb-3"><span data-feather="delete"> Delete</span></a>
            <img src="https://source.unsplash.com/1200x400?{{ $post->genre['name'] }}" alt="{{ $post->genre['name'] }}" class="img-fluid">
            <h1 class="mb-3">{{ $post->title }}</h1>
            <p>Genre: <a href="/genrelist/{{ $post->genre['slug'] }}" class="text-decoration-none text-dark">{{ $post->genre['name'] }}</a></p>
            <p>Author: {{ $post->author }}</p>
            <p>Publisher: {{ $post->publisher }}</p>
            <p> {{\Carbon\Carbon::parse($post['created_at'])->diffForHumans() }}</p>
        </div>
    </div>
</div>
--}}