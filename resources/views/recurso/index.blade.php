@extends('layout')

@section('content')
    <h3>Listado de Recursos</h3>
    <table>
        <thead>
            <td>Id</td>
            <td>Empresa</td>
            <td>Tipo Recurso</td>
            <td>Nombre</td>
            <td>Estado</td>
            <td>Formato Tiempo</td>
            <td>Acciones</td>
        </thead>
        <tbody>
            @foreach ($recursos as $recurso)
            <tr>
              <td>{{$recurso->id}}</td>
              <td>{{$empresas[$recurso->empresa_id]}}</td>
              <td>{{$tiporecursos[$recurso->tipo_recurso_id]}}</td>
              <td>{{$recurso->nombre}}</td>
              <td>{{$estados[$recurso->estado_id]}}</td>
              <td>{{$recurso->time_format_reserve}}</td>
              <td>
                <a href="{{ route("recurso.edit", $recurso->id)}}">Editar</a>
                <a href="{{ route("recurso.create")}}">Crear</a>
                <a href="{{ route("recurso.destroy", $recurso->id)}}">Eliminar</a>
            </td>
            </tr>
                @endforeach
        </tbody>
    </table>
    {{$recursos->links()}}
@endsection
