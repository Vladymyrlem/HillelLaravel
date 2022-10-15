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
    <h1>Trash Tags List</h1>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Title</th>
            <th scope="col">Slug</th>
            <th scope="col">Created_at</th>
            <th scope="col">Updated_at</th>
            <th scope="col">Restore</th>
            <th scope="col">Destroy</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($tags as $tag)
            <tr>
                <th>{{ $tag->id }}</th>
                <th>{{ $tag->title }}</th>
                <th>{{ $tag->slug }}</th>
                <th>{{ $tag->created_at }}</th>
                <th>{{ $tag->updated_at }}</th>
                <td><a class="btn btn-info" href="{{ route('adminTagRestore',['id' => $tag->id]) }}">RESTORE</a></td>
                <td><a class="btn btn-danger" href="{{ route('adminTagForceDelete',['id' => $tag->id]) }}">X</a></td>
            </tr>
        @empty
            <p>Empty</p>
        @endforelse
        </tbody>
    </table>
    <a class="btn btn-secondary mt-3" href="{{ route('adminTag') }}"> Back </a>
@endsection
