<?php
@extends('layouts.app')

@section('content')
    <h1>Articles Favoris</h1>

    <div class="row">
        @foreach ($favorites as $favorite)
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ asset($favorite->photo) }}" class="card-img-top" alt="{{ $favorite->title }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $favorite->title }}</h5>
                        <p class="card-text">{{ $favorite->description }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
