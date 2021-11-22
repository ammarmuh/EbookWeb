@extends('layouts.main')

@section('container')
    <div class="card bg-info border-0" style="width: 25rem;">
        <img src="{{ $image }}" class="img-thumbnail rounded-circle mx-5 my-5" alt="{{ $name }}">
        <div class="card-body text-white">
        <h5 class="card-title">{{ $name }} ({{ $presensi }})</h5>
        <p class="card-text mb-1">Kelas : {{ $kelas }}</p>
        <p class="card-text">Email : {{ $email }}</p>
        </div>
    </div>
@endsection