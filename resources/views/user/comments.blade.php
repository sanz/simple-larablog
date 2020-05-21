@extends('layouts.app')

@section('body')

<div class="container py-4">
    <div class="row">

        <div class="col-12">
            <div class="card">
                
                <div class="card-body">
                    <div class="card-title d-flex justify-content-between align-items-center">
                        <span class="display-4"> Comments</span>
                        
                        {{-- <a href="{{ route('user.categories.create') }}" class="btn btn-primary">Create New</a> --}}
                        
                    </div>
                    
                    <table class="table">
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Comment</th>
                                <th>Post</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($comments as $comment)
                                <tr>
                                    <td>{{ $comment->user->name }}</td>
                                    <td>{{ $comment->body }}</td>
                                    <td>{{ $comment->post->title }}</td>

                                    <td class="d-flex">
                                        <form action="{{ route('user.comments.destroy', $comment) }}" method="POST">
                                            @csrf @method('DELETE')

                                            <button class="btn btn-xs btn-danger" type="submit">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">No categories available.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{ $comments->links() }}
    </div>
</div>


@endsection
