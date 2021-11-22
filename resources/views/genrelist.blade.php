@extends('layouts.main')

@section('container')
<div class="container">
    <div class="row">
            <h1 class="mb-3 text-info">Genre List</h1>
            @foreach ($genrelist as $genre)
            <div class="col-md-4">
                <a href="/genrelist/{{ $genre->slug }}">
                    <div class="card bg-dark text-white border-0 mb-4">
                        <img src="https://source.unsplash.com/500x500?{{ $genre->name }}" class="card-img" alt="{{ $genre->name }}">
                        <div class="card-img-overlay d-flex align-items-center p-0">
                            <h5 class="card-title text-center flex-fill p-4 fs-3 bg-info">{{ $genre->name }}</h5>                      
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div> 
@endsection