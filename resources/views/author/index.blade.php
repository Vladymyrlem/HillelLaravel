@extends('layout')


@section('title')
    Author Page
@endsection

@section('content')
    @isset($_SESSION['success'])
        <div class="alert alert-info" role="alert">
            {{   $_SESSION['success']  }}
        </div>
        @php
            unset($_SESSION['success']);
        @endphp
    @endisset
    <table class="table table-bordered table-hover table-dark">
        <thead>
        <tr>
            <th scope="col">Number</th>
            <th scope="col">Author name</th>
            <th scope="col">Email</th>
            <th scope="col">Created_at</th>
            <th scope="col">Updated_at</th>
            <th>See Author</th>
        </tr>
        </thead>
        <tbody>
        @php($index = 1)
        @foreach($author as $auth)

            <tr>
                <th scope="row">{{ $index++ }}</th>
                <th>{{ $auth->name }}</th>
                <td>{{ $auth->email }}</td>
                <td>{{ $auth->created_at }}</td>
                <td>{{ $auth->updated_at }}</td>
                <td><a href="/author/{{ $auth->id }}">Show</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
