@extends('layout')

@section('content')
    <h3>Listado de Clientes</h3>
<table>
    <thead>
        <td>Id</td>
        <td>Nombre</td>
        <td>Teléfono</td>
        <td>@Email</td>
        <td>Acciones</td>
    </thead>
    <tbody>
        @foreach ($clientes as $cliente)
        <tr>
          <td>{{$cliente->id}}</td>
          <td>{{$cliente->nombre}}</td>
          <td>{{$cliente->telefono}}</td>
          <td>{{$cliente->email}}</td>
          <td>
            <a href="{{ route("cliente.edit", $cliente->id)}}">Editar</a>
            <a href="{{ route("cliente.create")}}">Crear</a>
            <a href="{{ route("cliente.destroy", $cliente->id)}}">Eliminar</a>
        </td>
        </tr>
            @endforeach

    </tbody>
</table>

    {{$clientes->links()}}
@endsection
