@extends('admin.layouts.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 flex-column align-items-center">
                <div class="col-sm-6">
                    <h1 class="text-center">Редактирование категории</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right d-flex justify-content-center">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('adminCategory')}}">Categories</a></li>
                        <li class="breadcrumb-item active">{{ $category->title }}</li>
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
                            <h3 class="card-title">Категория "{{ $category->title }}"</h3>
                        </div>
                        <!-- /.card-header -->

                        <form role="form" method="post"
                              action="{{ route('adminCategoryUpdate', ['id' => $category->id]) }}">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" value="{{ $category->id }}">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" name="title"
                                           class="form-control @error('title') is-invalid @enderror" id="title"
                                           value="{{ $category->title }}">
                                </div>
                            </div>
                            @if($errors->has('title'))
                                @foreach($errors->get('title') as $error)
                                    <div class="alert alert-danger" role="alert">
                                        {{ $error }}
                                    </div>
                                @endforeach
                            @endif
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="slug">Slug</label>
                                    <input type="text" name="slug"
                                           class="form-control @error('title') is-invalid @enderror" id="slug"
                                           value="{{ $category->slug }}">
                                </div>
                            </div>
                            @if($errors->has('slug'))
                                @foreach($errors->get('slug') as $error)
                                    <div class="alert alert-danger" role="alert">
                                        {{ $error }}
                                    </div>
                                @endforeach
                            @endif
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Сохранить</button>
                            </div>
                        </form>

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

