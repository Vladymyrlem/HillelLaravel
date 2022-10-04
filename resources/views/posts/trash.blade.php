@extends('layout')

@section('title', 'Posts')

@section('breadcrumbs')
    @include('particials.breadcrumbs', [
        'links'=> [
            [
                'link' => '/categories',
                'name' => 'Category List'
            ],[
                'link' => '/tags',
                'name' => 'Tag List'
            ], [
                'link' => '/',
                'name' => 'Post List'
            ]
        ]
    ])
@endsection

@section('content')
    @isset($_SESSION['success'])
        <div class="alert alert-success" role="alert">
            {{ $_SESSION['success'] }}
        </div>
    @endisset
    @php
        unset($_SESSION['success']);
    @endphp
    <h1>Post List</h1>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Title</th>
            <th scope="col">Slug</th>
            <th scope="col">Body</th>
            <th scope="col">Category</th>
            <th scope="col">Tags</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($posts as $post)
            <tr>
                <th scope="row">{{ $post->id }}</th>
                <td>{{ $post->title }}</td>
                <td>{{ $post->slug }}</td>
                <td>{{ $post->body }}</td>
                <td>{{ $post->category_id }}</td>
                <td>{{ $post->tags->pluck('title')->join(', ') }}</td>
                <td><a href="/posts/{{ $post->id }}/restore">RESTORE</a></td>

            </tr>
        @empty
            <p>Empty</p>
        @endforelse
        </tbody>
    </table>
    <a class="btn btn-secondary mt-3" href="/posts"> Back </a>
@endsection
