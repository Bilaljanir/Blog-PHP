@extends('layouts.main')

@section('title')
    {{$post->title_en}}
@endsection

@section('content')
    <div class="row my-5">
        <div class="col-md-8">
            <div class="card p-4 ">
                <div class="row">
                        <div class="col-md-12 mb-2">
                            <div class="card h-100">
                                <img src="{{$post->photo}}"
                                     class="card-img-top"
                                     alt="{{$post->title_en}}">
                                <div class="card-body">
                                    <div class="card-title">
                                        {{$post->title_en}}

                                    </div>
                                    <p class="card-text">
                                        {{ $post->body_en }}
                                    </p>
                                </div>
                            </div>
                        </div>
                </div>

                </div>
            </div>
        </div>

        <div class="col-md-4 ">
            <ul class="list-group">
                @foreach($categories as $category)
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <a href="{{route('category.posts', $category)}}" class="btn btn link text-decoration-none text-dark">
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
