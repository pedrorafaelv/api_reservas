@extends('layout')

@section('content')
<h3>Lista de Estados</h3>
<a href="{{ route("estado.create")}}">Nuevo estado</a>
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
          <td>{{$estado->entidad->nombre}}</td>
          <td>{{$estado->nombre}}</td>
          <td>
            <a href="{{ route("estado.edit", $estado->id)}}">Editar</a>
            <a href="{{ route("estado.show", $estado->id)}}">Ver</a>
             <form action="{{ route("estado.destroy", $estado->id)}}" method="post">
                @csrf
                @method('delete')
                <button type="submit">Eliminar</button>
             </form>
        </td>
        </tr>
            @endforeach
    </tbody>
</table>
{{$estados->links()}}
@endsection
