@extends('admin.layouts.main')
@section('contentt')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Редактировние категории</h1>
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
                    <form action="{{route('admin.category.update',$category->id)}}" method="post">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <input type="text" class="form-control"  placeholder="Добавьте категорию" name="title" value="{{$category->title}}">
                                @error('title')
                                    <div class="text-danger">Это поле необходимо заполнить</div>
                                @enderror
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
