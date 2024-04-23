extends('layout')
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
          <td>{{$empresas[$reserva->empresa_id]}}</td>
          <td>{{$reserva->fecha_inicio}}</td>
          <td>{{$reserva->fecha_fin}}</td>
          <td>{{$clientes[$reserva->cliente_id]}}</td>
          <td>{{$recursos[$reserva->recurso_id]}}</td>
          <td>{{$estados[$reserva->estado_id]}}</td>
        </tr>
    </tbody>
</table>
@endsection
