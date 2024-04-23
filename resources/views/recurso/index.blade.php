@extends('layout')

@section('content')
<a href="{{ route("recurso.create")}}">Nuevo Recurso</a>
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
              <td>{{$recurso->empresa->nombre}}</td>
              <td>{{$recurso->tiporecurso->nombre}}</td>
              <td>{{$recurso->nombre}}</td>
              <td>{{$recurso->estado['nombre']}}</td>
              <td>{{$recurso->time_format_reserve}}</td>
              <td>
                <a href="{{ route("recurso.edit", $recurso->id)}}">Editar</a>
                <a href="{{ route("recurso.show", $recurso->id)}}">Ver</a>
                <form action="{{ route("recurso.destroy", $recurso->id)}}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit">Eliminar</button>
                </form>
            </td>
            </tr>
                @endforeach
        </tbody>
    </table>
    {{$recursos->links()}}
@endsection
