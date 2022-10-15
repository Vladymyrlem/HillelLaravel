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
            <th scope="col">{{ $tag->id }}</th>
            <th scope="col">{{ $tag->title }}</th>
            <th scope="col">{{ $tag->slug }}</th>
            <th scope="col">
                @foreach($tag->posts as $post)
                        <?php echo $post->title . '<br>'; ?>
                @endforeach
            </th>
            <th scope="col">{{ $tag->created_at }}</th>
            <th scope="col">{{ $tag->updated_at }}</th>
        </tr>
        </tbody>
    </table>
@endsection()
