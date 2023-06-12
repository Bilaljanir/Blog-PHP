@extends('layouts.admin.main')

@section('title')
    Posts
@endsection

@section('content')
    <div class="row my-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div>
                        <h4 class="card-title">
                            <a href="{{route('posts.create')}}" class="btn btn-sm btn-primary">
                                <i class="fas fa-plus"></i>
                            </a>
                        </h4>
                    </div>
                    <hr>
                    <table class="table table-hovered">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>By</th>
                            <th>Image</th>
                            <th>Added</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($posts as $key => $post)
                            <tr>
                                <td>{{$key+=1}}</td>
                                <td>
                                    <a href="{{route('posts.show',$post)}}" target="_blank">
                                        {{$post->title_en}}
                                    </a>
                                </td>
                                <td>{{$post->category->name_en}}</td>
                                <td>{{$post->admin->name}}</td>
                                <td>
                                    <img src="{{asset($post->photo)}}"
                                         width="60"
                                         height="60"
                                         class="rounded"
                                         alt="{{$post->title_en}}">
                                </td>
                                <td>
                                    {{$post->created_at->diffForHumans()}}
                                </td>
                                <td class="d-flex">
                                    <a href="{{route('posts.edit',$post)}}" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button onclick="
                                                        if(confirm('are you sure ?'))
                                                        document.getElementById({{$post->id}}).submit();
                                                        " class="btn btn-sm btn-danger mx-2">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                    <form id="{{$post->id}}" action="{{route('posts.destroy',$post)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-center">
                    {{$posts->links()}}
                </div>
            </div>
        </div>
    </div>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <p>&copy; 2023 create by bilal janir  </p>
                </div>
            </div>
        </div>
    </footer>
@endsection
