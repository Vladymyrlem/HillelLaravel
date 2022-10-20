@extends('layout')


@section('title')
    Login Page
@endsection

@section('content')

    <div class="container">
    <form action="" method="post">
        @csrf

        @if($errors->has('error'))
            @foreach($errors->get('error') as $error)

            <div class="alert alert-danger mt-3" role="alert">
                    {{ $error }}
            </div>
            @endforeach
        @endif

        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email','') }}">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
    </div>
@endsection
