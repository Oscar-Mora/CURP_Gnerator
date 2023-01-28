@extends('layouts.plantilla')

@section('title', 'show') 

@section('content')   

<h1>"Bienvenido a la página del usuario: <?= $user->names.' '.$user->last_name_1.' '.$user->last_name_2;?>"</h1>
<div>
    <div class="btns-group">
        <a href="{{route('home')}}" class="volver">Volver a Home</a>
        <br>
        @if($user->curp == null)
        @elseif($user->curp != null)
        <a href="{{route('users.curp', $user)}}" class="editar">Generar CURP</a>
        <br>
        @endif
        <a href="{{route('users.edit',$user)}}" class="editar"> Editar info user</a>
        
        <form action="{{route('users.destroy', $user)}}" method="POST">
            @csrf
            @method('delete')
            <button type="submit" class="editar">
                Eliminar
            </button>
        </form>
    </div>

</div>


@endsection