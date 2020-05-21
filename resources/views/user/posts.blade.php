@extends('layouts.app')

@section('body')

<div class="container py-4">
    <div class="row">

        <div class="col-12">
            <div class="card">
                
                <div class="card-body">
                    <div class="card-title d-flex justify-content-between align-items-center">
                        <span class="display-4"> Posts</span>
                        
                        <a href="{{ route('user.posts.create') }}" class="btn btn-primary">Create New</a>
                    </div>
                    
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Body</th>
                                <th>Author</th>
                                <th>Category</th>
                                <th>Published</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($posts as $post)
                                <tr>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ substr($post->body, 0, 60) }}</td>
                                    <td>{{ $post->user->name }}</td>
                                    <td>{{ $post->category->name }}</td>
                                    <td>{{ $post->published }}</td>
                                    <td class="d-flex">
                                        <a href="{{ route('posts.show', $post) }}" class="btn btn-xs btn-success">Show</a>
                                        <a href="{{ route('user.posts.edit', $post) }}" class="btn btn-xs btn-info">Edit</a>

                                        <form action="{{ route('user.posts.destroy', $post) }}" method="POST">
                                            @csrf @method('DELETE')

                                            <button class="btn btn-xs btn-danger" type="submit">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">No post available.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
        {{ $posts->links() }}
    </div>
</div>


@endsection
