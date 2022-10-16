@extends('admin.layouts.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 flex-column align-items-center">
                <div class="col-sm-6">
                    <h1 class="text-center">Edit Post</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right d-flex justify-content-center">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('adminPost')}}">Posts</a></li>
                        <li class="breadcrumb-item active">{{ $post->title }}</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Edit Post: "{{ $post->title }}"</h3>
                        </div>
                        <!-- /.card-header -->

                        <form method="post" action="{{ route('adminPostUpdate', ['id' => $post->id]) }}"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" value="{{ $post->id }}">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Enter title</label>
                                    <input type="text" class="form-control" id="title" name="title"
                                           value="{{ old('title')?? $post->title }}" placeholder="Enter title">
                                    @if($errors->has('title'))
                                        @foreach($errors->get('title') as $error)
                                            <div class="alert alert-danger" role="alert">
                                                {{ $error }}
                                            </div>
                                        @endforeach
                                    @endif
                                </div>


                                <div class="mb-3">
                                    <label for="body" class="form-label">Enter body</label>
                                    <textarea class="form-control" name="body" id="body" cols="30"
                                              rows="4">{{ old('body')?? $post->body }}</textarea>
                                    @if($errors->has('body'))
                                        @foreach($errors->get('body') as $error)
                                            <div class="alert alert-danger mt-3" role="alert">
                                                {{ $error }}
                                            </div>
                                        @endforeach
                                    @endif
                                </div>


                                <div class="mb-3">
                                    <label for="user_id" class="form-label">Select a author</label>
                                    <select class="form-select" id="user_id" name="user_id">
                                        @foreach($users as $user)
                                            <option
                                                {{ old('user_id')?? $post->user_id == $user->id ? 'selected' : '' }} value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('user_id'))
                                        @foreach($errors->get('user_id') as $error)
                                            <div class="alert alert-danger" role="alert">
                                                {{ $error }}
                                            </div>
                                        @endforeach
                                    @endif
                                </div>

                                <div class="mb-3">
                                    <label for="category_id" class="form-label">Select a category</label>
                                    <select class="form-select" id="category_id" name="category_id">
                                        @foreach($categories as $category)
                                            <option
                                                {{  old('category_id')??$post->category_id == $category->id? 'selected' : '' }} value="{{ $category->id == old('category_id')? old('category_id'): $category->id }}">{{ $category->title }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('category_id'))
                                        @foreach($errors->get('category_id') as $error)
                                            <div class="alert alert-danger" role="alert">
                                                {{ $error }}
                                            </div>
                                        @endforeach
                                    @endif
                                </div>

                                <div class="mb-3">
                                    <label for="tag_id" class="form-label">Select a tag(s) + ctrl</label>
                                    <select class="form-select" id="tag_id" name="tags_id[]" multiple>
                                        @foreach($tags as $tag)
                                            <option
                                                @if(empty(old('tags_id')))
                                                    @foreach($post->tags as $tag_id)
                                                        {{ $tag->id == $tag_id->id? 'selected' : '' }}
                                                    @endforeach
                                                @else
                                                    @foreach(old('tags_id') as $tag_id)
                                                        {{ $tag->id == $tag_id? 'selected' : '' }}
                                                    @endforeach
                                                @endif
                                                value="{{ $tag->id }}">{{ $tag->title }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('tags_id'))
                                        @foreach($errors->get('tags_id') as $error)
                                            <div class="alert alert-danger" role="alert">
                                                {{ $error }}
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
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
