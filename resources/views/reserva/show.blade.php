@extends('layout')
@section('content')
<h3>Detalle de la reserva: {{$reserva->id}}</h3>
<table>
    <thead>
        <td>Id</td>
        <td>Empresa</td>
        <td>Fecha Inicio</td>
        <td>Fecha Fin</td>
        <td>Cliente</td>
        <td>Recurso</td>
        <td>Estado</td>
    </thead>
    <tbody>
        <tr>
          <td>{{$reserva->id}}</td>
          <td>{{$reserva->empresa->nombre}}</td>
          <td>{{$reserva->fecha_inicio}}</td>
          <td>{{$reserva->fecha_fin}}</td>
          <td>{{$reserva->cliente->nombre}}</td>
          <td>{{$reserva->recurso->nombre}}</td>
          <td>{{$reserva->estado->nombre}}</td>
        </tr>
    </tbody>
</table>
@endsection
