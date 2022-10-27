@extends('layout')


@section('title')
    Login Page
@endsection

@section('content')

    <div class="container">
        <form action="{{ route('authHandleLogin') }}" method="post">
            @csrf
            @if ($errors->has('email'))
                @foreach($errors->get('email') as $error)
                    <p>{{ $error }}</p>
                @endforeach
            @endif
            <div class="form-group mb-3">
                <label for="email">Email</label>
                <input type="text" placeholder="Email" id="email" class="form-control" name="email" required
                       autofocus>

            </div>
            @if ($errors->has('password'))
                @foreach($errors->get('password') as $error)
                    <span class="text-danger">{{ $error }}</span>
                @endforeach
            @endif
            <div class="form-group mb-3">
                <label for="password">Password</label>
                <input type="password" placeholder="Password" id="password" class="form-control" name="password"
                       required>

            </div>
            <div class="form-group mb-3">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="remember"> Remember Me
                    </label>
                </div>
            </div>
            <div class="d-grid mx-auto">
                <button type="submit" class="btn btn-dark btn-block">Signin</button>
            </div>
            <div class="d-grid mx-auto">
                <a class="nav-link" href="{{ $urlGitHub }}">Github</a>
            </div>
        </form>
    </div>
@endsection
