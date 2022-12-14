@extends('layout')


@section('title')
    Author Category Page
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
            <th scope="col">Title</th>
            <th scope="col">Author name</th>
            <th scope="col">Category</th>
            <th scope="col">Body</th>
            <th scope="col">Created_at</th>
            <th scope="col">Updated_at</th>
        </tr>
        </thead>
        <tbody>
        @php($index = 1)
        @foreach($posts as $post)

            <tr>
                <td scope="row">{{ $index++ }}</td>
                <td>{{ $post->title }}</td>
                <td><a href="/author/{{ $post->users->id }}">{{ $post->users->name }}</a></td>
                <td id="{{$post->categories->id}}">{{ $post->categories->title }}</td>
                <td>{{ $post->body }}</td>
                <td>{{ $post->created_at }}</td>
                <td>{{ $post->updated_at }}</td>

            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
