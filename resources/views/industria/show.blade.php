@extends('layout')

@section('content')
<h3>Detalle de la industria: {{$industrium->nombre}}</h3>
<table>
    <thead>
        <td>Id</td>
        <td>Nombre</td>
    </thead>
    <tbody>
        <tr>
          <td>{{$industrium->id}}</td>
          <td>{{$industrium->nombre}}</td>
        </tr>
    </tbody>
</table>
@endsection
