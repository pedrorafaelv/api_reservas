@extends('layout')

@section('content')
<h3>Listado de Reservas</h3>
    <table>
        <thead>
            <td>Id</td>
            <td>Empresa</td>
            <td>Fecha Inicio</td>
            <td>Fecha Fin</td>
            <td>Cliente</td>
            <td>Recurso</td>
            <td>Estado</td>
            <td>Acciones</td>
        </thead>
        <tbody>
            @foreach ($reservas as $reserva)
            <tr>
              <td>{{$reserva->id}}</td>
              <td>{{$empresas[$reserva->empresa_id]}}</td>
              <td>{{$reserva->fecha_inicio}}</td>
              <td>{{$reserva->fecha_fin}}</td>
              <td>{{$clientes[$reserva->cliente_id]}}</td>
              <td>{{$recursos[$reserva->recurso_id]}}</td>
              <td>{{$estados[$reserva->estado_id]}}</td>
              <td>
                <a href="{{ route("reserva.edit", $reserva->id)}}">Editar</a>
                <a href="{{ route("reserva.create")}}">Crear</a>
                <a href="{{ route("reserva.destroy", $reserva->id)}}">Eliminar</a>
            </td>
            </tr>
                @endforeach
        </tbody>
    </table>

 {{$reservas->links()}}
@endsection
