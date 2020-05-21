@extends('layouts.app')

@section('body')

<div class="container py-4">
    <div class="row">

        @include('partials.back-link')

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    Edit Category
                </div>

                <div class="card-body">
                <form action="{{ route('user.categories.update', $category) }}" method="POST">
                    @csrf
                    @method('PATCH')

                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" value="{{ $category->name }}" required class="form-control">

                            @error('name')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span> 
                            @enderror
                        </div>

                        <button class="btn btn-primary" type="submit">Update</button>

                    </form>
                </div>
            </div>
        </div>
        
    </div>
</div>


@endsection
