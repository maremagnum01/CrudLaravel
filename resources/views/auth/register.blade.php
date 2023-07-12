@extends('layouts.base')
@section('content')
<h1 class="col w-50 p-3 mx-auto ">Registrarse</h1>


<form action="{{route('register')}}" method="POST">
    @csrf
    <div class="col w-50 p-3 mx-auto">
        <div class="row-4">
            <div class="form-group">
                <strong>Usuario</strong>
                <input type="text" name="name" autofocus="autofocus" class="form-control" placeholder="Ingrese un nuevo usuario">
                @error('name')
                    <small style="color:red">{{$message}}</small>
                @enderror
            </div>
        </div>
        <div class="row-4">
            <div class="form-group">
                <strong>Mail</strong>
                <input type="email" name="email" class="form-control" placeholder="Ingrese su correo">
                @error('email')
                    <small style="color:red">{{$message}}</small>
                @enderror
            </div>
        </div>
        <div class="row-2">
            <div class="form-group">
                <strong>Contraseña</strong>
                <input type="password" name="password" class="form-control" placeholder="Ingrese su contraseña">
                @error('password')
                    <small style="color:red">{{$message}}</small>
                @enderror
            </div>
        <div class="row-2">
            <div class="form-group">
                <strong>Confirmar contraseña</strong>
                <input type="password" name="password_confirmation" class="form-control" placeholder="Reingrese la contraseña">
                @error('password_confirmation')
                    <small style="color:red">{{$message}}</small>
                @enderror
            </div>
        </div>
        <div class="row-2 mt-2">
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Registrarse</button>
                <a href="{{route('tasks.index')}}" class="btn btn-primary ">Volver</a>
            </div>
        </div>
    </div>
</form>


@endsection

