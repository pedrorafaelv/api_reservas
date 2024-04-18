@extends('layout')

@section('content')
<h3>Listado de Industrias</h3>
<table>
    <thead>
        <td>Id</td>
        <td>Nombre</td>
        <td>Acciones</td>
    </thead>
    <tbody>
        @foreach ($industrias as $industria)
        <tr>
          <td>{{$industria->id}}</td>
          <td>{{$industria->nombre}}</td>
          <td>
            <a href="{{ route("industria.edit", $industria->id)}}">Editar</a>
            <a href="{{ route("industria.create")}}">Crear</a>
            <a href="{{ route("industria.destroy", $industria->id)}}">Eliminar</a>
        </td>
        </tr>
            @endforeach

    </tbody>
</table>
{{$industrias->links()}}
@endsection
