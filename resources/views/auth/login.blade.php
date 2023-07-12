@extends('layouts.base')
@section('content')
<h1 class="col w-50 p-3 mx-auto ">Login</h1>


<form action="{{route('login')}}" method="POST">
    @csrf
    <div class="col w-50 p-3 mx-auto">
        <div class="row-4">
            <div class="form-group">
                <strong>Email</strong>
                <input type="email" name="email" autofocus="autofocus" class="form-control" placeholder="Ingrese su mail">
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
                <input name="remember" type="checkbox" >
                <strong>Recordar</strong>
            </div>
        </div>
        <div class="row-2 mt-2">
            <div class="form-group">
                <button class="btn btn-success" type="submit">Login</button>
                <a href="{{route('register')}}" class="btn btn-primary ">Registrarse</a>
                <a href="{{route('tasks.index')}}" class="btn btn-primary ">Volver</a>
            </div>
        </div>
    </div>
</form>


@endsection

