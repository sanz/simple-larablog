@extends('layouts.app')

@section('body')

<div class="container py-4">
    <div class="row">

        <div class="col-12 mb-4">
            <h3 class="display-4">Hello, {{ auth()->user()->name }}</h3>
        </div>

        <div class="col-md-4">
            <div class="card mb-3" style="max-width: 18rem;">
                <div class="card-header">Posts</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $posts }}</h5>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card mb-3" style="max-width: 18rem;">
                <div class="card-header">Categories</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $categories }}</h5>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card mb-3" style="max-width: 18rem;">
                <div class="card-header">Comments</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $comments }}</h5>
                </div>
            </div>
        </div>


    </div>
</div>


@endsection
