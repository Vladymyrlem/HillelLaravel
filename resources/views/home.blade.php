@extends('layout')

@section('title', 'Main page')

@section('content')
    <h1>Home Page</h1>
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
            <th scope="col">Title</th>
            <th scope="col">Author name</th>
            <th scope="col">Category</th>
            <th scope="col">Body</th>
            <th scope="col">Updated_at</th>
        </tr>
        </thead>
        <tbody>
        @php($index = 1)
        @foreach($posts as $post)

            <tr>
                <th scope="row">{{ $post->id }}</th>
                <th scope="row">{{ $post->title }}</th>
                <td><a href="/author/{{ $post->users->id }}">{{ $post->users->name }}</a></td>
                <td><a href="/category/{{ $post->categories->id }}">{{ $post->categories->title }}</a></td>
                <td>{{ $post->body }}</td>
                <td>{{ date_create($post->updated_at)->format('Y-m-d') }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
