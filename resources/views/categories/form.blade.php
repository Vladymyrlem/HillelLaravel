@extends('layout')

@section('content')
    <form action="/categories/store" method="post">
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
            <label for="price" class="form-label">Slug</label>
            <input type="text" class="form-control" id="slug" name="slug" value="{{ $_SESSION['data']['slug'] ?? '' }}">
            @isset($_SESSION['errors']['slug'])
                @foreach($_SESSION['errors']['slug'] as $slug)
                    <div class="alert alert-danger" role="alert">
                        {{ $slug }}
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
