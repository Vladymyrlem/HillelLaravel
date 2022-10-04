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
    <table class="table table-bordered table-hover table-dark">
        <thead>
        <tr>
            <th colspan="2" style="text-align: center;"><a href="../" style="font-size: 20px; color: #ffc107">&#11152;
                    back</a></th>
            <th colspan="7" style="text-align: center;"><a href="posts/create"
                                                           style="font-size: 20px; color: #ffc107"> Create Post</a></th>
            <th colspan="2" style="text-align: center;"><a href="/posts/trash"
                                                           style="font-size: 20px; color: #ffc107"> Posts Trash</a>
            </th>
        </tr>
        </thead>
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">title</th>
            <th scope="col">slug</th>
            <th scope="col">body</th>
            <th scope="col">category</th>
            <th scope="col">tags</th>
            <th scope="col">created_at</th>
            <th scope="col">updated_at</th>
            <th scope="col">update</th>
            <th scope="col">delete</th>
            <th scope="col">show</th>
        </tr>
        </thead>
        <tbody>
        @forelse($posts as $post)
            <tr>
                <th scope="row">{{ $post->id }}</th>
                <td>{{ $post->title }}</td>
                <td>{{ $post->slug }}</td>
                <td>{{ $post->body}}</td>
                <td>
                    {{$post->category->title}}
                </td>
                <td>
                        {{$post->tags->pluck('title')->join(',')}}
                </td>
                <td>{{ $post->created_at }}</td>
                <td>{{ $post->updated_at }}</td>
                <td><a class="btn btn-success btn-sm" href="posts/{{ $post->id }}/edit">&#9999;<i
                                class="fa fa-edit"></i></a></td>
                <td><a class="btn btn-light btn-sm" href="posts/{{ $post->id }}/delete">&#10060;<i
                                class="fa fa-trash"></i></a></td>

                <td><a class="btn btn-light btn-sm" href="posts/{{ $post->id }}">Show</a></td>
            </tr>
        @empty
            <p>Empty</p>
        @endforelse
        </tbody>
    </table>
@endsection
