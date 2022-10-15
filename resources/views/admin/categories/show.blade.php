@extends('layout')

@section('content')
    <table class="table table-bordered table-hover table-dark">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">title</th>
            <th scope="col">slug</th>
            <th scope="col">Posts</th>
            <th scope="col">created_at</th>
            <th scope="col">updated_at</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="col">{{ $category->id }}</th>
            <th scope="col">{{ $category->title }}</th>
            <th scope="col">{{ $category->slug }}</th>
            <th scope="col">
                @foreach($category->posts as $post)
                        <?php echo $post->title . '<br>'; ?>
                @endforeach
            </th>
            <th scope="col">{{ $category->created_at }}</th>
            <th scope="col">{{ $category->updated_at }}</th>
        </tr>
        </tbody>
    </table>
@endsection()
