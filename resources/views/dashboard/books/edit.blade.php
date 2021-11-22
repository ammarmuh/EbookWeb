@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">EditBook</h1>
  </div>

  <div class="col-lg-8">      
      <form method="post" action="/dashboard/books/{{ $post->id }}" class="mb-5" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" class="form-control @error('title') is-invalid @enderror"  id="title" name="title" required autofocus value="{{ $post->title }}">
          @error('title')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
          @enderror
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" required value="{{ $post->slug }}">
            @error('slug')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
          @enderror
        </div>
        <div class="mb-3">
            <label for="genre" class="form-label">Genre</label>
            <select class="form-select" name="genrelist_id">
              @foreach ($genrelist as $genre)
                @if (old('genrelist_id') == $genre->id)
                <option value="{{ $genre->id }}" selected>{{ $genre->name }}</option>
                @else
                <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                @endif
              @endforeach
              </select>
        </div>
        <div class="mb-3">
          <label for="author" class="form-label">Author</label>
          <input type="text" class="form-control @error('author') is-invalid @enderror" id="author" name="author" required value="{{ $post->author }}">
          @error('author')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="publisher" class="form-label">Publisher</label>
          <input type="text" class="form-control @error('publisher') is-invalid @enderror" id="publisher" name="publisher" required value="{{ $post->publisher }}">
          @error('publisher')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
          @enderror
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input class="form-control @error('image') is-invalid @enderror " id="image" type="file" id="image" name="image">
            @error('image')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
          @enderror
          </div>
          
        <button type="submit" class="btn btn-primary">Add Book</button>
      </form>
    </div>

    {{-- <trix-editor input="image"></trix-editor>            
    @error('image')
    <p class="text-danger">{{ $message }}</p>
    @enderror --}}
  
{{-- <script>
    const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');
    
    title.addEventListener('change', function() {
        fetch('/dashboard/books/checkSlug?title=' + title.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug)
      });
</script> --}}
    
@endsection