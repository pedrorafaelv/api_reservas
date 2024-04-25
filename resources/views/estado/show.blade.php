@extends('layout')

@section('content')
<h3>Detalle del Estado: {{$estado->nombre}}</h3>
<table>
    <thead>
        <td>Id</td>
        <td>Entidad</td>
        <td>Nombre</td>
    </thead>
    <tbody>
        <tr>
          <td>{{$estado->id}}</td>
          <td>{{$estado->entidad->nombre}}</td>
          <td>{{$estado->nombre}}</td>
        </tr>
    </tbody>
</table>
@endsection

