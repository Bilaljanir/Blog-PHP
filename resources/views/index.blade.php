@extends('layouts.app')

@section('content')
    <h1>Articles Favoris</h1>

    <div class="row">
        @foreach ($favorites as $favorite)
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ asset($favorite->post->photo) }}" class="card-img-top" alt="{{ $favorite->post->title }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $favorite->post->title }}</h5>
                        <p class="card-text">{{ $favorite->post->description }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
