@extends('layouts.plantilla')

@section('title', 'users') 

@section('content')   

<h1>'Bienvenido a la página de Usuarios'</h1>
<a href="{{route('users.create')}}" class="crear">Crear usuario</a>
    <ul>
        @foreach ($users  as $user)
        <li>
        <a class="listado" href = "{{route('users.show', ['user' => $user->id])}}"/>
            {{$user->id.'=>'.$user->names.' '.$user->last_name_1}}
            </li>
        @endforeach
    </ul>



    
    {{$users->links()}}
    @endsection