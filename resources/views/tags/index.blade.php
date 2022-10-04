@extends('layout')

@section('title', 'Tags')

@section('breadcrumbs')
    @include('particials.breadcrumbs', [
        'links'=> [
            [
                'link' => '/categories',
                'name' => 'Category List'
            ], [
                'link' => '/',
                'name' => 'Tag List'
            ],[
                'link' => '/posts',
                'name' => 'Post List'
            ]
        ]
    ])
@endsection

@section('content')
    @isset($_SESSION['success'])
        <div class="alert alert-success" role="alert">
            {{ $_SESSION['success'] }}
        </div>
    @endisset
    @php
        unset($_SESSION['success']);
    @endphp
    <h1>Tag List</h1>
    <table class="table table-bordered table-hover table-dark">
        <thead>
        <tr>
            <td colspan="3" style="text-align: center;"><a href="../" style="font-size: 20px; color: #ffc107">&#11152;
                    back</a></td>
            <td colspan="5" style="text-align: center;"><a href="/tags/create"
                                                           style="font-size: 20px; color: #ffc107"> Create Tag</a>
            </td>
            <td colspan="2" style="text-align: center;"><a href="/tags/trash"
                                                           style="font-size: 20px; color: #ffc107"> Tags trash</a>
            </td>
        </tr>
        </thead>
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">title</th>
            <th scope="col">slug</th>
            <th scope="col">posts</th>
            <th scope="col">created_at</th>
            <th scope="col">updated_at</th>
            <th scope="col">update</th>
            <th scope="col">delete</th>
            <th scope="col">show</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($tags as $tag)
            <tr>
                <th scope="row">{{ $tag->id }}</th>
                <td>{{ $tag->title }}</td>
                <td>{{ $tag->slug }}</td>
                <td>  @foreach($tag->post as $post)
                            <?php echo $post->title . '<br>'; ?>
                    @endforeach </td>
                <td>{{ $tag->created_at }}</td>
                <td>{{ $tag->updated_at }}</td>
                <td><a class="btn btn-success btn-sm" href="tags/{{ $tag->id }}/edit">&#9999;<i
                                class="fa fa-edit"></i></a></td>
                <td><a class="btn btn-light btn-sm" href="tags/{{ $tag->id }}/delete">&#10060;<i
                                class="fa fa-trash"></i></a></td>
                <td><a class="btn btn-light btn-sm" href="tags/{{ $tag->id }}">show<i
                                class="fa fa-eye"></i></a></td>
            </tr>
        @empty
            <p>Empty</p>
        @endforelse
        </tbody>
    </table>
@endsection
