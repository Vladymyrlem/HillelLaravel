@extends('admin.layouts.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Categories</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{route('home')}}</a></li>
                        <li class="breadcrumb-item active">Tags Page</li>
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
                            <h3 class="card-title">Categories List</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <a href="{{ route('adminCategoryCreate') }}" class="btn btn-primary mb-3"> Add Category</a>
                            <a href="{{ route('adminCategoryTrash') }}" class="btn btn-primary mb-3">Category Trash</a>
                            @if (count($categories))
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-dark">
                                        <thead>
                                        <tr>
                                            <th scope="col" style="width: 30px">#</th>
                                            <th scope="col">Наименование</th>
                                            <th scope="col">Slug</th>
                                            <th scope="col">Actions</th>
                                            <th scope="col">Created at</th>
                                            <th scope="col">Updated at</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($categories as $category)
                                            <tr>
                                                <td>{{ $category->id }}</td>
                                                <th>
                                                    <a href="{{route( 'adminCategoryShow', ['categoryId' => $category->id]) }}">{{ $category->title }}</a>
                                                </th>
                                                <td>{{ $category->slug }}</td>
                                                <td>{{ $category->created_at }}</td>
                                                <td>{{ $category->updated_at }}</td>
                                                <td>
                                                    <a href="{{ route('adminCategoryEdit', ['id' => $category->id]) }}"
                                                       class="btn btn-info btn-sm float-left mr-1">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                    <a href="{{ route('adminCategoryDelete', ['id' => $category->id]) }}"
                                                       class="btn btn-danger btn-sm float-right mr-1">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <p>Категорий пока нет...</p>
                            @endif
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            {{ $categories->links() }}
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

