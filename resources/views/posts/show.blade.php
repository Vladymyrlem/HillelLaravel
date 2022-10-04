@extends('layout')

@section('content')
    <h1>{{ $post->title }}</h1>
    <ul>
        <li>
            Slug: {{ $post->slug }}
            created: {{ $post->created_at }}
            update: {{ $post->updated_at }}
        </li>
        <li>
            Body: {{ $post->slug }}
        </li>
        <li>
            Category: {{ $post->category_id }}
        </li>
    </ul>
@endsection()