@extends('layouts.app')

@section('body')

<div class="container py-4">
    <div class="row">

        @include('partials.back-link')

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    Create Post
                </div>

                <div class="card-body">
                <form action="{{ route('user.posts.store') }}" method="POST">
                    @csrf


                        <div class="form-group">
                            <label for="">Title</label>
                            <input type="text" name="title" value="{{ old('title') }}" required class="form-control">

                            @error('title')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span> 
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Body</label>
                            <textarea name="body" required class="form-control" cols="30" rows="10">{{ old('body') }}</textarea>

                            @error('body')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span> 
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Categories</label>
                            <select name="category" class="form-control">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach 
                            </select>

                            @error('category')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span> 
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="publish" id="publish-post" checked>
                                <label class="custom-control-label" for="publish-post">Do you want to publish this post?</label>
                            </div>
                        </div>

                        <button class="btn btn-primary" type="submit">Create</button>

                    </form>
                </div>
            </div>
        </div>
        
    </div>
</div>


@endsection
