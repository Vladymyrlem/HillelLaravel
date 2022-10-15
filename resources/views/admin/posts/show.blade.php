@extends('layout')

@section('content')
    <table class="table table-bordered table-hover table-dark">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">title</th>
            <th scope="col">Body</th>
            <th scope="col">Tags</th>
            <th scope="col">created_at</th>
            <th scope="col">updated_at</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="col">{{ $post->id }}</th>
            <th scope="col">{{ $post->title }}</th>
            <th scope="col">{{ $post->body }}</th>
            <th scope="col">
                @foreach($post->tags as $tag)
                    <a href="{{ route('adminTagShow', $tag->slug) }}">
                        {!!  htmlspecialchars($post->title, ENT_QUOTES) .'<br>' !!}
                    </a>
                @endforeach
            </th>
            <th scope="col">{{ $post->created_at }}</th>
            <th scope="col">{{ $post->updated_at }}</th>
        </tr>
        </tbody>
    </table>
@endsection()
