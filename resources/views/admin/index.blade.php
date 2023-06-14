@extends('layouts.admin.main')

@section('title')
    Posts
@endsection

@section('content')
    <div class="row my-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="card-title">Posts</h4>
                        <a href="{{ route('posts.create') }}" class="btn btn-sm btn-primary">
                            <i class="fas fa-plus"></i> Add Post
                        </a>
                    </div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title (EN)</th>
                                <th>Title (FR)</th>
                                <th>Category</th>
                                <th>Author</th>
                                <th>Image</th>
                                <th>Added</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($posts as $key => $post)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>
                                        <a href="{{ route('posts.show', $post) }}" target="_blank">
                                            {{ $post->title_en }}
                                        </a>
                                    </td>
                                    <td>{{ $post->title_fr }}</td>
                                    <td>{{ $post->category->name_en }}</td>
                                    <td>{{ $post->admin->name }}</td>
                                    <td>
                                        <img src="{{ asset($post->photo) }}"
                                             width="60"
                                             height="60"
                                             class="rounded"
                                             alt="{{ $post->title_en }}">
                                    </td>
                                    <td>{{ $post->created_at->diffForHumans() }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('posts.edit', $post) }}" class="btn btn-sm btn-warning me-2">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <button onclick="
                                                    if (confirm('Are you sure?')) {
                                                        document.getElementById('delete-form-{{ $post->id }}').submit();
                                                    }"
                                                    class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash"></i> Delete
                                            </button>
                                            <form id="delete-form-{{ $post->id }}" action="{{ route('posts.destroy', $post) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
