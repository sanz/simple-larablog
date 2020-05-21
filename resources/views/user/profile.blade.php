@extends('layouts.app')

@section('body')

<div class="container py-4">
    <div class="row">

        <div class="col-12">
            <div class="display-4 mb-4">Profile</div>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Value</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">Id</th>
                        <td>{{ auth()->id() }}</td>
                    </tr>

                    <tr>
                        <th scope="row">Name</th>
                        <td>{{ auth()->user()->name }}</td>
                    </tr>

                    <tr>
                        <th scope="row">Email</th>
                        <td>{{ auth()->user()->email }}</td>
                    </tr>

                    <tr>
                        <th scope="row">Joined</th>
                        <td>{{ auth()->user()->updated_at->diffForHumans() }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        
    </div>
</div>


@endsection
