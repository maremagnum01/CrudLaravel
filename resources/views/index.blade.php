@extends('layouts.base')

@section('content')
<div class="row">
    <div class="col-12">
        <div>
            <h2 class="text-white">Tareas con CRUD</h2>
        </div>
        <div>
            @guest
            <a href="{{route('login')}}" class="btn btn-primary">Acceder</a>
            @endguest
            @auth
            <a href="{{route('tasks.create')}}" class="btn btn-primary">Crear tarea</a>
            @endauth
        </div>
    </div>

    @switch(Session::get('status'))
    @case('Tarea eliminada')
        <div class="alert alert-danger mt-2">
            <strong>{{Session::get('status')}}</strong>
            <br>
        </div>
        @break
    @case('Tarea actualizada')
        <div class="alert alert-warning mt-2">
            <strong>{{Session::get('status')}}</strong>
            <br>
        </div> 
        @break
    @case('Nueva tarea realizada') 
        <div class="alert alert-success mt-2">
            <strong>{{Session::get('status')}}</strong>
            <br>
        </div>
        @break
    @case('Cuenta nueva creada')
        <div class="alert alert-success mt-2">
            <strong>{{Session::get('status')}}</strong>
            <br>
        </div>
        @break
    @case('Bienvenido')
        <div class="alert alert-success mt-2">
            <strong>{{Session::get('status')}} {{Auth::user()->name}}</strong>
            <br>
        </div>
        @break
    @case('Usuario desconectado')
        <div class="alert alert-danger mt-2">
            <strong>{{Session::get('status')}}</strong>
            <br>
        </div>
        @break
    @endswitch


    <div class="col-12 mt-4">
        <table class="table table-bordered text-white">
            <tr class="text-secondary">
                <th>Tarea</th>
                <th>Descripción</th>
                <th>Fecha</th>
                <th>Estado</th>
                @auth<th>Acción</th>@endauth
            </tr>
            @foreach($tasks as $task)
            <tr>
                <td class="fw-bold">{{$task->title}}</td>
                <td>{{$task->description}}</td>
                <td>
                    {{$task->due_date}}
                </td>
                <td>
                    <span class="badge bg-success fs-6">{{$task->status}}</span>
                </td>          
                @auth
                <td>
                    <a href="{{route('tasks.edit', $task)}}" class="btn btn-warning">Editar</a>
                    
                    <form action="{{route('tasks.destroy', $task)}}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Deseas eliminar la tarea?')">Eliminar</button>
                    </form>
                </td>
                @endauth
            </tr>
            @endforeach
        </table>
        {{$tasks->links()}}
    </div>
    @auth
    <form action="{{route('logout')}}" method="POST">
        @csrf
        <a href="#" class="btn btn-primary" onclick="this.closest('form').submit()">Logout</a>
    </form>
    <p>Usuario logeado {{Auth::user()->name}}</p>
    @endauth
</div>
@endsection