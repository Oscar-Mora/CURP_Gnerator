@extends('layouts.plantilla')

@section('title', 'curp') 

@section('content') 

<h1>Usted está consultando la informacion de: <?= ucfirst($user->names)." ".ucfirst($user->last_name_1);?></h1>
<h1>Su curp es:
</h1>

<h3>
<?= $CURP?>

</h3>

@endsection