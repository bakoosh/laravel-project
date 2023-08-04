@extends('admin.layouts.main')
@section('contentt')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Редактировние поста</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <form action="{{route('admin.post.update',$post->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Добавьте категорию" name="title"
                                   value="{{$post->title}}">
                            @error('title')
                            <div class="text-danger">Это поле необходимо заполнить</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <textarea id="summernote" name="content">{{$post->content}}</textarea>
                            @error('content')
                            <div class="text-danger">Это поле необходимо заполнить</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputFile">Обновите превью изоброжения</label>
                            <div class="form-group">
                                <img src="{{ asset('storage/' . $post->preview_image )}}" class="w-25">
                            </div>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="exampleInputFile"
                                           name="preview_image">
                                    <label class="custom-file-label" for="exampleInputFile">Выберите файл</label>
                                </div>
                                @error('preview_image')
                                <div class="text-danger">Это поле необходимо заполнить</div>
                                @enderror
                                <div class="input-group-append">
                                    <span class="input-group-text">Загрузить</span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputFile">Обновите главное изоброжение</label>
                            <div class="form-group">
                                <img src="{{ asset('storage/' . $post->main_image )}}" class="w-25">
                            </div>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="exampleInputFile"
                                           name="main_image">
                                    <label class="custom-file-label" for="exampleInputFile">Выберите файл</label>
                                </div>
                                @error('main_image')
                                <div class="text-danger">Это поле необходимо заполнить</div>
                                @enderror
                                <div class="input-group-append">
                                    <span class="input-group-text">Загрузить</span>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label>Выберите категорию</label>
                            <select class="form-control" name="category_id">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}" @selected($category->id==$post->category_id)>
                                            {{$category->title}}
                                    </option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group">
                            <label>Тэги</label>
                            <select class="select2" multiple="multiple" name="tag_ids[]"
                                    data-placeholder="Select a State" style="width: 100%;">
                                @foreach($tags as $tag)
                                    <option @selected(is_array($post->tags->pluck('id')->toArray()) && in_array($tag->id,$post->tags->pluck('id')->toArray())) value="{{$tag->id}}">{{$tag->title}}</option>
                                @endforeach

                            </select>
                        </div>


                        <div class="col-2">
                            <input type="submit" class="btn btn-primary" value="Обновить">
                        </div>
                    </form>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
