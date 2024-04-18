@extends('layout')
@section('content')
<h3>Tipos de Tipo de Recursos</h3>
<table>
    <thead>
        <td>Id</td>
        <td>Nombre</td>
        <td>Acciones</td>
    </thead>
    <tbody>
        @foreach ($tiporecursos as $tiporecurso)
        <tr>
          <td>{{$tiporecurso->id}}</td>
          <td>{{$tiporecurso->nombre}}</td>
          <td>
            <a href="{{ route("tiporecurso.edit", $tiporecurso->id)}}">Editar</a>
            <a href="{{ route("tiporecurso.create")}}">Crear</a>
            <a href="{{ route("tiporecurso.destroy", $tiporecurso->id)}}">Eliminar</a>
        </td>
        </tr>
            @endforeach

    </tbody>
</table>
{{$tiporecursos->links()}}
@endsection
