@extends('layout')

@section('title', 'Categories')

@section('breadcrumbs')
    @include('particials.breadcrumbs', [
        'links'=> [
            [
                'link' => 'admin/categories',
                'name' => 'Category List'
            ], [
                'link' => '/',
                'name' => 'Tag List'
            ], [
                'link' => 'admin/posts',
                'name' => 'Posts List'
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
    <h1>Category List</h1>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Title</th>
            <th scope="col">Slug</th>
            <th scope="col">Posts</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($categories as $category)
            <tr>
                <th scope="row">{{ $category->id }}</th>
                <td>{{ $category->title }}</td>
                <td>{{ $category->slug }}</td>
                <td>{{ $category->post->pluck('title')->join(', ') }}</td>
                <td><a href="{{ route('admintagRestore',['id' => $category->id]) }}">RESTORE</a></td>

            </tr>
        @empty
            <p>Empty</p>
        @endforelse
        </tbody>
    </table>
    <a class="btn btn-secondary mt-3" href="{{ route('adminTag') }}"> Back </a>
@endsection
