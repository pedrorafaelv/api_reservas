@extends('layout')

@section('content')
<div class="custom-container">
    <h3>Detalle del recurso: {{$recurso->nombre}}</h3>
</div>
<div class="custom-container">
    <div class="grid grid-cols-6 custom-grid">
        <div>Id</div>
        <div>Empresa</div>
        <div>Tipo Recurso</div>
        <div>Nombre</div>
        <div>Estado</div>
        <div>Formato Tiempo</div>
    </div>
    <div class="grid grid-cols-6 custom-grid">
        <div>{{$recurso->id}}</div>
        <div>{{$recurso->empresa->nombre}}</div>
        <div>{{$recurso->tiporecurso->nombre}}</div>
        <div>{{$recurso->nombre}}</div>
        <div>{{$recurso->estado['nombre']}}</div>
        <div>{{$recurso->time_format_reserve}}</div>
    </div>
</div>
@endsection
