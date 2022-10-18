@extends('layout')


@section('title')
    Login Page
@endsection

@section('content')
    @if($errors->has('error'))
        <div class="alert alert-danger mt-3" role="alert">
            @foreach($errors->get('error') as $error)
                {{ $error }}
            @endforeach
        </div>
    @endif
    <form action="{{ route('authHandleLogin') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email','') }}">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
