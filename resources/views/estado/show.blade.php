@extends('layout')

@section('content')
<div class="custom-container h-12">
    <h3>Detalle del Estado: {{$estado->nombre}}</h3>
</div>
<div class="custom-container">
    <div class="grid grid-cols-3 custom-grid ">
        <div>Id</div>
        <div>Tipo Recurso</div>
        <div>Nombre</div>
    </div>
    <div class="grid grid-cols-3 custom-grid ">
        <div>{{$estado->id}}</div>
        <div>{{$estado->tipoRecurso->nombre}}</div>
        <div>{{$estado->nombre}}</div>
    </div>
</div>
@endsection

