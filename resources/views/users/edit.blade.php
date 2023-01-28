@extends('layouts.plantilla')

@section('title', 'Edit')

@section('content')

<h1>'Formulario para crear un usuario'</h1>

<form action="{{route('users.update')}}" method="post">
@csrf
    <label for="full_name">Nombre Completo</label>
        <input type="text" placeholder="Ingrese su Nombre Completo">
    <label for="gender">Genero</label>
        <select name="gender" id="gender">
        <option value="masculino">Masculino</option>
        <option value="femenino">Femenino</option>
        </select>
    <label for="place_of_birth">Fecha de Nacimiento</label>
        <input type="date">
    <label for="place_of_birth">Lugar de Nacimiento</label>
        <select name="place_of_birth" id="place_of_birth">
        <option value="BC">Baja California</option>
        <option value="BS">Baja California Sur</option>
        <option value="CC">Campeche</option>
        <option value="CS">Chiapas</option>
        <option value="CH">Chihuahua</option>
        <option value="DF">Ciudad de México</option>
        <option value="CL">Coahuila</option>
        <option value="CM">Colima</option>
        <option value="DG">Durango</option>
        <option value="GT">Guanajuato</option>
        <option value="GR">Guerrero</option>
        <option value="HG">Hidalgo</option>
        <option value="JC">Jalisco</option>
        <option value="MC">México</option>
        <option value="MN">Michoacán</option>
        <option value="MS">Morelos</option>
        <option value="NT">Nayarit</option>
        <option value="NL">Nuevo León</option>
        <option value="OC">Oaxaca</option>
        <option value="PL">Puebla</option>
        <option value="QO">Querétaro</option>
        <option value="QR">Quintana Roo</option>
        <option value="SP">San Luis Potosí</option>
        <option value="SL">Sinaloa</option>
        <option value="SR">Sonora</option>
        <option value="TC">Tabasco</option>
        <option value="TS">Tamaulipas</option>
        <option value="TL">Tlaxcala</option>
        <option value="VZ">Veracruz</option>
        <option value="YN">Yucatán</option>
        <option value="ZS">Zacatecas</option>
        </select>
    <button type="submit">Editar Usuario</button>

</form>




@endsection()