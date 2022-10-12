@extends('layout')


@section('title')
    Category Page
@endsection

@section('content')
    @isset($_SESSION['success'])
        <div class="alert alert-info" role="alert">
            {{   $_SESSION['success']  }}
        </div>
        @php
            unset($_SESSION['success']);
        @endphp
    @endisset
    <table class="table table-bordered table-hover table-dark">
        <thead>
        <tr>
            <th scope="col">Number</th>
            <th scope="col">Title</th>
            <th scope="col">Body</th>
            <th scope="col">Created_at</th>
            <th scope="col">Updated_at</th>
        </tr>
        </thead>
        <tbody>
        @php($index = 1)
        @foreach($categories as $cat)
            <tr>
                <th scope="row">{{ $cat->id }}</th>
                <th><a href="category/{{ $cat->id }}">{{ $cat->title }}</a></th>
                <td>{{ $cat->slug }}</td>
                <td>{{ $cat->created_at }}</td>
                <td>{{ $cat->updated_at }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
