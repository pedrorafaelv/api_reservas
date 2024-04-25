@extends('layout')
@section('content')
<h3>Detalle de la entidad: {{$entidad->nombre}}</h3>
<table>
    <thead>
        <td>Id</td>
        <td>Nombre</td>
    </thead>
    <tbody>
        <tr>
          <td>{{$entidad->id}}</td>
          <td>{{$entidad->nombre}}</td>
        </tr>
    </tbody>
</table>
@endsection
