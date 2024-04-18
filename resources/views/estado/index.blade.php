@extends('layout')

@section('content')
<h3>Lista de Estados</h3>
<table>
    <thead>
        <td>Id</td>
        <td>Entidad</td>
        <td>Nombre</td>
        <td>Acciones</td>
    </thead>
    <tbody>
        @foreach ($estados as $estado)
        <tr>
          <td>{{$estado->id}}</td>
          <td>{{$estado->entidad}}</td>
          <td>{{$estado->nombre}}</td>
          <td>
            <a href="{{ route("estado.edit", $estado->id)}}">Editar</a>
            <a href="{{ route("estado.create")}}">Crear</a>
            <a href="{{ route("estado.destroy", $estado->id)}}">Eliminar</a>
        </td>
        </tr>
            @endforeach
    </tbody>
</table>
{{$estados->links()}}
@endsection
