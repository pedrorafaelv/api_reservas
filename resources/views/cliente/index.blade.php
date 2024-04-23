@extends('layout')

@section('content')
    <h3>Listado de Clientes</h3>
    <a href="{{ route("cliente.create")}}">Nuevo Cliente</a>
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
            <a href="{{ route("cliente.show", $cliente->id)}}">Ver</a>
            <form action="{{ route("cliente.destroy", $cliente)}}" method="post">
                @csrf
                @method('delete')
               <button type="submit">Eliminar</button>
            </form>
        </td>
        </tr>
            @endforeach

    </tbody>
</table>

    {{$clientes->links()}}
@endsection
