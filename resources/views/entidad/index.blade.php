@extends('layout')
@section('content')
<h3>Entidades</h3>
<a href="{{ route("entidad.create")}}">Nueva Entidad</a>
<table>
    <thead>
        <td>Id</td>
        <td>Nombre</td>
        <td>Acciones</td>
    </thead>
    <tbody>
        @foreach ($entidads as $entidad)
        <tr>
          <td>{{$entidad->id}}</td>
          <td>{{$entidad->nombre}}</td>
          <td>
            <a href="{{ route("entidad.edit", $entidad->id)}}">Editar</a>
            <a href="{{ route("entidad.show", $entidad->id)}}">Ver</a>
             <form action="{{ route("entidad.destroy", $entidad->id)}}" method="post">
                @csrf
                @method('delete')
                <button type="submit">Eliminar</button>
             </form>
        </td>
        </tr>
            @endforeach

    </tbody>
</table>
{{$entidads->links()}}
@endsection
