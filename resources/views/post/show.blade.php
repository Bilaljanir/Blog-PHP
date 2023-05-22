@extends('layouts.main')

@section('title')
    {{$post->title_en}}
@endsection

@section('content')
    <div class="row my-5">
        <div class="col-md-8">
            <div class="card p-4">
                <div class="row">
                    <div class="col-md-12 mb-2">
                        <div class="card h-100">
                            <img src="{{asset($post->photo)}}"
                                 class="card-img-top"
                                 alt="{{$post->title_en}}">
                            <div class="card-body">
                                <div class="d-flex justify-content-center my-3">
                                    <span class="badge bg-danger">
                                        <i class="fas fa-clock me-1"></i>
                                        {{$post->created_at->diffForHumans()}}
                                    </span>
                                    <span class="badge bg-success mx-2">
                                        <i class="fas fa-user me-1"></i>
                                        {{$post->admin->name}}
                                    </span>
                                    <span class="badge bg-primary">
                                        <i class="fas fa-tag me-1"></i>
                                        @if(session()->get('lang') === 'fr')
                                            {{$post->category->name_fr}}
                                        @else
                                            {{$post->category->name_en}}
                                        @endif
                                    </span>
                                </div>
                                <div class="card-title fw-bold">
                                    @if(session()->get('lang') === 'fr')
                                        {{$post->title_fr}}
                                    @else
                                        {{$post->title_en}}
                                    @endif
                                </div>
                                <p class="card-text">
                                    @if(session()->get('lang') === 'fr')
                                        {{$post->body_fr}}
                                    @else
                                        {{$post->body_en}}
                                    @endif
                                </p>
                                <div class="row my-2">
                                    <div class="col-md-6">
                                        @isset($previous)
                                            <a href="{{route('posts.show', $previous)}}" class="btn btn-link">
                                                @if(session()->get('lang') === 'fr')
                                                    <div>
                                                        Precedent
                                                    </div>
                                                    {{$previous->title_fr}}
                                                @else
                                                    <div>
                                                        Previous
                                                    </div>
                                                    {{$post->title_en}}
                                                @endif
                                            </a>
                                        @endisset
                                    </div>
                                    <div class="col-md-6">
                                        @isset($next)
                                            <a href="{{route('posts.show', $next)}}" class="btn btn-link">
                                                @if(session()->get('lang') === 'fr')
                                                    <div>
                                                        Suivant
                                                    </div>
                                                    {{$post->title_fr}}
                                                @else
                                                    <div>
                                                        Next
                                                    </div>
                                                    {{$post->title_en}}
                                                @endif
                                            </a>
                                        @endisset
                                    </div>
                                </div>
                                <hr>
                                <comments-count></comments-count>
                                <hr>
                                <comments-component :post_id="{{$post->id}}"></comments-component>
                                <hr>
                                @auth
                                     <add-comment
                                    :post_id="{{$post->id}}"
                                    :user_id="{{auth()->user()->id}}"></add-comment>
                                     @endcanany
                                @guest
                                    <div class="alert alert-info">
                                        <a href="{{route('login')}}" class="btn btn-link text-decoration-none text-dark">
                                            Login to add your comment
                                        </a>
                                    </div>
                                @endguest
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @include('layouts.sidebar')

@endsection
