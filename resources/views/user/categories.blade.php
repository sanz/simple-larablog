@extends('layouts.app')

@section('body')

<div class="container py-4">
    <div class="row">

        <div class="col-12">
            <div class="card">
                
                <div class="card-body">
                    <div class="card-title d-flex justify-content-between align-items-center">
                        <span class="display-4"> Categories</span>
                        
                        <a href="{{ route('user.categories.create') }}" class="btn btn-primary">Create New</a>
                        
                    </div>

                    <div class="alert alert-warning">
                        Warning! Deleting categories will also delete all related posts.
                    </div>
                    
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($categories as $category)
                                <tr>
                                    <td>{{ $category->name }}</td>
                                    <td class="d-flex">
                                        <a href="{{ route('user.categories.edit', $category) }}" class="btn btn-xs btn-info">Edit</a>

                                        <form action="{{ route('user.categories.destroy', $category) }}" method="POST">
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

    </div>
</div>


@endsection
