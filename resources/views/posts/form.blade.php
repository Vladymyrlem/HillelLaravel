@extends('layout')

@section('content')
    <form action="/posts/store" method="post">
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $_SESSION['data']['title'] ?? '' }}">
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
        <div class="input-group">
            <span class="input-group-text">Body</span>
            <textarea class="form-control" aria-label="With textarea"id="body" name="body" value="{{ $_SESSION['data']['body'] ?? '' }}"></textarea>
            @isset($_SESSION['errors']['body'])
                @foreach($_SESSION['errors']['body'] as $body)
                    <div class="alert alert-danger" role="alert">
                        {{ $body }}
                    </div>
                @endforeach
            @endisset
        </div>
        <div class="mb-3">
            <label for="category_id" class="form-label">Category</label>
            <select name="category_id" id="category_id">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
            </select>

            @isset($_SESSION['errors']['category_id'])
                @foreach($_SESSION['errors']['category_id'] as $error)
                    <div class="alert alert-danger" role="alert">
                        {{ $error }}
                    </div>
                @endforeach
            @endisset
        </div>

        <div class="mb-3">
            <label for="tags" class="form-label">Tags</label>
            <select multiple aria-label="multiple select example" name="tags[]" id="tags">
                @foreach($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->title }}</option>
                @endforeach
            </select>

            @isset($_SESSION['errors']['tag_id'])
                @foreach($_SESSION['errors']['tag_id'] as $error)
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
