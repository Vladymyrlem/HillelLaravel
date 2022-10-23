@extends('admin.layouts.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Posts</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Posts Page</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Posts List</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            @can('create', \App\Models\Post::class)
                            <a href="{{ route('adminPostCreate') }}" class="btn btn-primary mb-3">Add Post</a>
                            @endcan
                                <a href="{{ route('adminPostTrash') }}" class="btn btn-primary mb-3">Posts Trash</a>

                            @if (count($posts))
                                <div class="table-responsive">
                                    <table class="table table-bordered table-dark table-hover text-wrap">
                                        <thead>
                                        <tr>
                                            <th scope="col">Id</th>
                                            <th scope="col">Title</th>
                                            <th scope="col">Body</th>
                                            <th scope="col">Category</th>
                                            <th scope="col">Author</th>
                                            <th scope="col">Tags</th>
                                            <th scope="col">Created_at</th>
                                            <th scope="col">Updated_at</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($posts as $post)
                                            <tr>
                                                <td>{{ $post->id }}</td>
                                                <td>
                                                    <a href="{{route('adminPostShow',$post->id)}}">
                                                        {{ $post->title }}
                                                    </a>
                                                </td>
                                                <td>{{ $post->body }}</td>
                                                <td>
                                                    <a href="{{route('adminCategoryShow',$post->categories->id)}}">
                                                        {{ $post->categories->title }}
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="{{ route('author.show', ['authorId' => $post->users->id])  }}">{{ $post->users->name }}</a>
                                                </td>
                                                <td>@forelse($post->tags as $tag)
                                                        {!! $tag->title . '<br>' !!}
                                                    @empty
                                                            <?php echo 'Tags Not Found'; ?>
                                                        <br><a href="{{route('adminPostEdit',$post->id)}}">Do you want
                                                            to add tag</a>
                                                    @endforelse
                                                </td>
                                                <td>{{ $post->created_at }}</td>
                                                <td>{{ $post->updated_at }}</td>
                                                <td>
                                                    @can('update', $post)
                                                    <a href="{{ route('adminPostEdit', ['id' => $post->id]) }}"
                                                       class="btn btn-info btn-sm float-left mr-1">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                    @endcan
                                                        @can('delete', $post)
                                                        <a href="{{ route('adminPostDelete', ['id' => $post->id]) }}"
                                                       class="btn btn-danger btn-sm">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </a>
                                                            @endcan
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <p>Posts Not Found...</p>
                            @endif
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            {{ $posts->links() }}
                        </div>
                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

