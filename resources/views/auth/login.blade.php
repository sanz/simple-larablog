@extends('layouts.register')

@section('body')
    <form class="form-signin" action="{{ route('login') }}" method="POST">
        @csrf

        <h1 class="h3 mb-3 font-weight-normal">Sign In</h1>

        <div class="form-group">
            <label for="inputEmail" class="sr-only">Email address</label>
            <input type="email" name="email" class="form-control" placeholder="Email address" required="">

            @error('email')
                <span class="text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Password" required="">

            @error('password')
                <span class="text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </span> 
            @enderror
        </div>

        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>

        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>

    
        <p class="mt-5 mb-3 text-muted">© Simple Larablog {{ now()->year}}</p>
        <p>New to Larablog? <a href="{{ route('register') }}">Create account</a></p>
    </form>
@endsection