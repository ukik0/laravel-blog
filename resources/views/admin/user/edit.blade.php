@extends('admin.layouts.main')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Редактирование пользователя</h1>
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
                    <div class="col-12">
                        <form method="POST" action="{{route('admin.user.update', $user->id)}}" class="w-25">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <input value="{{$user->name}}" type="text" class="form-control" name="name" placeholder="Имя пользователя">
                                @error('name')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input value="{{$user->email}}" type="email" class="form-control" name="email" placeholder="Имя пользователя">
                                @error('email')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group w-50">
                                <label>Выберите роль</label>
                                <select name="role" class="form-control">
                                    @foreach($roles as $id=>$role)
                                        <option value="{{$id}}" {{$id == $user->role ? "selected" : ""}}>
                                            {{$role}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            @error('role')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                            <div class="form-group w-50">
                                <input type="hidden" name="user_id" value="{{$user->id}}">
                            </div>
                            <button type="submit" class="btn btn-primary">
                                Обновить
                            </button>
                        </form>
                    </div>
                </div>
                <!-- /.row -->

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
