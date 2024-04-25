@extends('layout')
@section('content')
<h3>Tipos de Recursos</h3>
<a href="{{ route("tiporecurso.create")}}">Nuevo Tipo de Recurso</a>
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
            <a href="{{ route("tiporecurso.show", $tiporecurso->id)}}">Ver</a>
             <form action="{{ route("tiporecurso.destroy", $tiporecurso->id)}}" method="post">
                @csrf
                @method('delete')
                <button type="submit">Eliminar</button>
             </form>
        </td>
        </tr>
            @endforeach

    </tbody>
</table>
{{$tiporecursos->links()}}
@endsection
