@extends('layout')
@section('content')
<div class="custom-container">
    <h3>Detalle de la reserva: {{$reserva->id}}</h3>
</div>
<div class="custom-container">
    <div class=" grid grid-cols-7 custom-grid">
        <div>Id</div>
        <div>Empresa</div>
        <div>Fecha Inicio</div>
        <div>Fecha Fin</div>
        <div>Cliente</div>
        <div>Recurso</div>
        <div>Estado</div>
    </div>
    <div class=" grid grid-cols-7 custom-grid">
        <div>{{$reserva->id}}</div>
        <div>{{$reserva->empresa->nombre}}</div>
        <div>{{$reserva->fecha_inicio}}</div>
        <div>{{$reserva->fecha_fin}}</div>
        <div>{{$reserva->cliente->nombre}}</div>
        <div>{{$reserva->recurso->nombre}}</div>
        <div>{{$reserva->estado->nombre}}</div>
    </div>
</div>
          @endsection
