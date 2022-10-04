@extends('layout')

@section('content')
    <form action="/tags/store" method="post">
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title"
                   value="{{ $_SESSION['data']['title'] ?? '' }}">

            @isset($_SESSION['errors']['title'])
                @foreach($_SESSION['errors']['title'] as $title)
                    <div class="alert alert-danger" role="alert">
                        {{ $title }}
                    </div>
                @endforeach
            @endisset
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control" id="slug" name="slug" value="{{ $_SESSION['data']['slug'] ?? '' }}">

            @isset($_SESSION['errors']['slug'])
                @foreach($_SESSION['errors']['slug'] as $slug)
                    <div class="alert alert-danger" role="alert">
                        {{ $slug }}
                    </div>
                @endforeach
            @endisset
        </div>
        <div class="mb-3">
            <label for="posts" class="form-label">Posts</label>
            <select multiple aria-label="multiple select example" name="posts[]" id="posts">
                @foreach($posts as $post)
                    <option value="{{ $post->id }}">{{ $post->title }}</option>
                @endforeach
            </select>
            @isset($_SESSION['errors']['$post'])
                @foreach($_SESSION['errors']['post'] as $error)
                    <div class="alert alert-danger" role="alert">
                        {{ $error }}
                    </div>
                @endforeach
            @endisset
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    @php
        unset($_SESSION['errors']);
        unset($_SESSION['data']);
    @endphp
@endsection()
