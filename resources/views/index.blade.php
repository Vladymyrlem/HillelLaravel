@extends('layout')

@section('title', 'Main page')



@section('content')
    <h1>{{ $header }}</h1>
@endsection


@section('breadcrumbs')
    @include('particials.breadcrumbs', [
        'links'=> [
            [
                'link' => '/',
                'name' => 'Home'
            ], [
                'link' => '/./list-categories.php',
                'name' => 'Category List'
            ], [
                'link' => '/./list-tags.php',
                'name' => 'Tag List'
            ]
        ]
    ])
@endsection