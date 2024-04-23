@extends('layout')

@section('content')
<h3>Detalle del cliente: {{$cliente->nombre}}</h3>
<table>
    <thead>
        <td>Id</td>
        <td>Nombre</td>
        <td>Teléfono</td>
        <td>@Email</td>
    </thead>
    <tbody>
        <tr>
          <td>{{$cliente->id}}</td>
          <td>{{$cliente->nombre}}</td>
          <td>{{$cliente->telefono}}</td>
          <td>{{$cliente->email}}</td>
        </tr>

    </tbody>
@include('fragment._errors-form')

@endsection

