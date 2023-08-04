@extends('admin.layouts.main')
@section('contentt')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Редактировние пользователя</h1>
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
                    <form action="{{route('admin.user.update',$user->id)}}" method="post">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Обновите имя пользователя" name="name"
                                   value="{{$user->name}}">
                            @error('title')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>


                        <div class="form-group">
                            <input type="email" class="form-control"  placeholder="Добавьте email пользователя" name="email" value="{{$user->email}}">
                            @error('email')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Добавьте пароль пользователя"
                                   name="password" value="{{old('password')}}">
                            @error('email')
                            <div class="text-danger">Введите пароль</div>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label>Обновите роль</label>
                            <select class="form-control" name="role">
                                @foreach($roles as $id=>$role)
                                    <option @selected($id==$user->role) value="{{$id}}">{{$role}}</option>
                                @endforeach
                            </select>
                            @error('role')
                            <div class="text-danger">Это поле необходимо изменить</div>
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
