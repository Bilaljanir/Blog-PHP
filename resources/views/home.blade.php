@extends('layouts.main')

@section('title')
    @if (isset($category))
        {{ucfirst($category->name_fr)}} articles
    @elseif(isset($tag))
        {{ucfirst($tag->name)}} articles
    @else
        Accueil
    @endif
@endsection

@section('content')
    <div class="row my-5">
        <div class="col-md-8">
            <div class="card p-4">
                <div class="row">
                    @isset($postsPremium)
                        @foreach ($postsPremium as $post)
                            <div class="col-md-4 mb-2">
                                <div class="card h-100">
                                    <img src="{{asset($post->photo)}}"
                                         class="card-img-top"
                                         alt="{{$post->title_fr}}">
                                    <div class="card-body">
                                        <div class="card-title fw-bold">
                                            @if(session()->get('lang') === 'fr')
                                                {{$post->title_fr}}
                                            @else
                                                {{$post->title_en}}
                                            @endif
                                        </div>
                                        <p class="card-text">
                                            @if(session()->get('lang') === 'fr')
                                                {{ Str::limit($post->body_fr, 100) }}
                                            @else
                                                {{ Str::limit($post->body_en, 100) }}
                                            @endif
                                        </p>
                                        <a href="{{route('posts.show', $post)}}" class="btn btn-primary">
                                            <i class="fas fa-eye"></i>
                                            @if(session()->get('lang') === 'fr')
                                                Voir
                                            @else
                                                View
                                            @endif
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endisset
                    @foreach ($posts as $post)
                        <div class="col-md-4 mb-1">
                            <div class="card h-100">
                                <img src="{{asset($post->photo)}}"
                                     class="card-img-top"
                                     alt="{{$post->title_fr}}">
                                <div class="card-body">
                                    <div class="card-title fw-bold">
                                        @if(session()->get('lang') === 'fr')
                                            {{$post->title_fr}}
                                        @else
                                            {{$post->title_en}}
                                        @endif
                                    </div>
                                    <p class="card-text">
                                        @if(session()->get('lang') === 'fr')
                                            {{ Str::limit($post->body_fr, 100) }}
                                        @else
                                            {{ Str::limit($post->body_en, 100) }}
                                        @endif
                                    </p>
                                    <a href="{{route('posts.show', $post)}}" class="btn btn-primary">
                                        <i class="fas fa-eye"></i>
                                        @if(session()->get('lang') === 'fr')
                                            Voir
                                        @else
                                            View
                                        @endif
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
       @include('layouts.sidebar')

    </div>
@endsection
