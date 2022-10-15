@extends('admin.layouts.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Редактирование тега</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Blank Page</li>
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
                            <h3 class="card-title">Тег "{{ $tag->title }}"</h3>
                        </div>
                        <!-- /.card-header -->

                        <form role="form" method="post" action="{{ route('adminTagUpdate', ['tag' => $tag->id]) }}">
                            @csrf
                            <input type="hidden" name="id" value="{{ $tag->id }}">
                            <div class="mb-3">
                                <label for="title" class="form-label">Enter title</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{ old('title',$tag->title) }}" placeholder="Enter title">
                            </div>
                            @if($errors->has('title'))
                                @foreach($errors->get('title') as $error)
                                    <div class="alert alert-danger" role="alert">
                                        {{ $error }}
                                    </div>
                                @endforeach
                            @endif
                            <div class=" mb-3">
                                <label for="slug" class="form-label">Enter slug</label>
                                <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug',$tag->slug) }}" placeholder="Enter slug">
                            </div>
                            @if($errors->has('slug'))
                                @foreach($errors->get('slug') as $error)
                                    <div class="alert alert-danger" role="alert">
                                        {{ $error }}
                                    </div>
                                @endforeach
                            @endif
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Submit</button>
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

