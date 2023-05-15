@extends('layouts.main')

@section('title')
    @if (isset($category))
        {{ucfirst($category->name_en)}} posts
    @elseif(isset($tag))
        {{ucfirst($tag->name)}} posts
    @else
        Home
    @endif
@endsection

@section('content')
    <div class="row my-5">
        <div class="col-md-8">
            <div class="card p-4 ">
                <div class="row">
                    @isset($postsPremium)
                        @foreach($postsPremium as $post)
                            <div class="col-md-4 mb-2">
                                <div class="card h-100">
                                    <img src="{{$posts->photo}}"
                                         class="card-img-top"
                                         alt="{{$post->title_en}}">
                                    <div class="card-body">
                                        <div class="card-title fw-bold">
                                            {{$post_title_en}}

                                        </div>
                                        <p class="card-text">
                                            {{  Str::limit($post->body_en, 100)}}
                                        </p>
                                        <a href="{{route('posts.show',$post)}}" class="btn btn-primary"></a>
                                    </div>
                                </div>
                            </div>

                        @endforeach
                    @endisset
                    @foreach($posts as $post)
                        <div class="col-md-4 mb-2">
                            <div class="card h-100">
                                <img src="{{$post->photo}}"
                                     class="card-img-top"
                                     alt="{{$post->title_en}}">
                                <div class="card-body">
                                    <div class="card-title fw-bold">
                                        {{$post->title_en}}

                                    </div>
                                    <p class="card-text">
                                        {{  Str::limit($post->body_en, 100)}}
                                    </p>
                                    <a href="{{route('posts.show',$post)}}" class="btn btn-primary">
                                        View
                                    </a>
                                </div>
                            </div>
                        </div>

                    @endforeach
                </div>
                <div class="card-footer bg-white">
                    <div class="d-flex justify-content-center">
                        {{$posts->links()}}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 ">
            <ul class="list-group">
                @foreach($categories as $category)
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <a href="{{route('category.posts', $category)}}"
                           class="btn btn link text-decoration-none text-dark">
                            {{$category->name_en}}
                        </a>
                        <span class="badge bg-primary rounded-pill">
                            {{$category->posts()->count()}}
                            </span>
                    </li>
                @endforeach
            </ul>
        </div>

    </div>

@endsection
