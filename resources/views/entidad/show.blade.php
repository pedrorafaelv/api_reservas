@extends('layout')
@section('content')
<div class="custom-container">

    <h3>Detalle de la entidad: {{$entidad->nombre}}</h3>
</div>
<div class="custom-container">
    <div class="custom-grid grid grid-cols-2">
        <div>Id</div>
        <div>Nombre</div>
    </div>
    <div class="custom-grid grid grid-cols-2">
        <div>{{$entidad->id}}</div>
        <div>{{$entidad->nombre}}</div>
    </div>
</div>
@endsection
