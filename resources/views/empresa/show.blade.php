@extends('layout')
<h3>Detalle de la empresa: {{$empresa->nombre}}</h3>
@section('content')
<table>
    <thead>
        <td>Id</td>
        <td>Nombre</td>
        <td>Dirección</td>
        <td>Teléfono</td>
        <td>Email</td>
        <td>Industria</td>
        <td>Fundación</td>
        <td>Ingresos</td>
        <td>Sitio Web</td>
        <td>descripción</td>
        <td>Hora de inicio</td>
        <td>Hora fin</td>
    </thead>
    <tbody>
        <tr>
          <td>{{$empresa->id}}</td>
          <td>{{$empresa->nombre}}</td>
          <td>{{$empresa->direccion}}</td>
          <td>{{$empresa->telefono}}</td>
          <td>{{$empresa->email}}</td>
          <td>{{$empresa->industria->nombre}}</td>
          <td>{{$empresa->fundacion}}</td>
          <td>{{$empresa->ingresos}}</td>
          <td>{{$empresa->sitio_web}}</td>
          <td>{{$empresa->descripcion}}</td>
          <td>{{$empresa->time_start}}</td>
          <td>{{$empresa->time_off}}</td>
        </tr>
        </tbody>
    </table>
@endsection
