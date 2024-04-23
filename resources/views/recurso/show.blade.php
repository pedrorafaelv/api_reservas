@extends('layout')

@section('content')
<h3>Detalle del recurso: {{$recurso->nombre}}</h3>
<table>
    <thead>
        <td>Id</td>
        <td>Empresa</td>
        <td>Tipo Recurso</td>
        <td>Nombre</td>
        <td>Estado</td>
        <td>Formato Tiempo</td>
    </thead>
    <tbody>
        <tr>
          <td>{{$recurso->id}}</td>
          <td>{{$recurso->empresa->nombre}}</td>
          <td>{{$recurso->tiporecurso->nombre}}</td>
          <td>{{$recurso->nombre}}</td>
          <td>{{$recurso->estado['nombre']}}</td>
          <td>{{$recurso->time_format_reserve}}</td>
        </tr>
    </tbody>
</table>
@endsection
