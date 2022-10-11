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
//        @endphp
    @endisset
    <table class="table table-bordered table-hover table-dark">
        <thead>
        <tr>
            <th scope="col">Number</th>
            <th scope="col">Title</th>
            <th scope="col">Author name</th>
            <th scope="col">Category</th>
            <th scope="col">Body</th>
            <th scope="col">Tag title</th>
            <th scope="col">Created_at</th>
            <th scope="col">Updated_at</th>
        </tr>
        </thead>
        <tbody>
        @php($index = 1)
        @foreach($posts as $post)
            <tr>
                <th scope="row">{{ $index++ }}</th>
                <th>{{ $post->title }}</th>
                <td>{{ $post->users->name }}</td>
                <td>{{ $post->categories->title }}</td>
                <td>{{ $post->body }}</td>
                <td>@foreach($post->tags as $tag)
                        {!!  htmlspecialchars($tag->title, ENT_QUOTES) .'<br>' !!}
                    @endforeach</td> {{-- Типо с защитой он инъекции. Нормально так делать? --}}
                <td>{{ $post->created_at->isoFormat('YYYY-M-d (dddd)') }}</td>
                <td>{{ $post->updated_at->diffForHumans() }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
