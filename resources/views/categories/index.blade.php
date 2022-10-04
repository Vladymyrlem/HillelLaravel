@extends('layout')

@section('title', 'Categories')

@section('breadcrumbs')
    @include('particials.breadcrumbs', [
        'links'=> [
            [
                'link' => '/',
                'name' => 'Category List'
            ], [
                'link' => '/tags',
                'name' => 'Tag List'
            ], [
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
    <h1>Category List</h1>
    <table class="table table-bordered table-hover table-dark">
        <thead>
        <tr>
            <td colspan="3" style="text-align: center;"><a href="../" style="font-size: 20px; color: #ffc107">&#11152;
                    back</a></td>
            <td colspan="5" style="text-align: center;"><a href="/categories/create"
                                                           style="font-size: 20px; color: #ffc107"> Create Category</a>
            </td>
            <td colspan="1" style="text-align: center;"><a href="/categories/trash"
                                                           style="font-size: 20px; color: #ffc107"> Categories Trash</a>
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
        @foreach($categories as $category)
            <tr>
                <th scope="row">{{ $category->id }}</th>
                <td>{{ $category->title }}</td>
                <td>{{ $category->slug }}</td>
                <td>          @foreach($category->post as $post)
                            <?php echo $post->title . '<br>'; ?>
                    @endforeach   </td>

                <td>{{ $category->created_at }}</td>
                <td>{{ $category->updated_at }}</td>
                <td><a class="btn btn-success btn-sm" href="categories/{{ $category->id }}/edit">&#9999;<i
                                class="fa fa-edit"></i></a></td>
                <td><a class="btn btn-light btn-sm" href="categories/{{ $category->id }}/delete">&#10060;<i
                                class="fa fa-trash"></i></a></td>
                <td><a class="btn btn-light btn-sm" href="categories/{{ $category->id }}">show<i
                                class="fa fa-eye"></i></a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
