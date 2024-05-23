@extends('layout')
@section('content')
<div class="custom-container">

    <h3>Detalle de la entidad: {{$entidad->nombre}}</h3>
</div>
<div class="custom-container">
    <div class="custom-grid grid grid-cols-4">
        <div class="col-start-2">Id</div>
        <div>Nombre</div>
    </div>
    <div class="custom-grid grid grid-cols-4">
        <div class="col-start-2" >{{$entidad->id}}</div>
        <div>{{$entidad->nombre}}</div>
    </div>
</div>
@endsection
