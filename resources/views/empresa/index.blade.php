@extends('layout')
@section('content')
 <h3>Listado de Empresas</h3>
 <a href="{{ route("empresa.create")}}">Nueva Empresa</a>

 <table>
    <thead>
        <td>Id</td>
        <td>Nombre</td>
        <td>Dirección</td>
        <td>Teléfono</td>
        <td>Email</td>
        <td>Industria</td>
        <td>Acciones</td>
    </thead>
    <tbody>
        @foreach ($empresas as $empresa)
        <tr>
          <td>{{$empresa->id}}</td>
          <td>{{$empresa->nombre}}</td>
          <td>{{$empresa->direccion}}</td>
          <td>{{$empresa->telefono}}</td>
          <td>{{$empresa->email}}</td>
          <td>{{$empresa->industria->nombre}}</td>
          <td>
            <a href="{{ route("empresa.edit", $empresa->id)}}">Editar</a>
            <a href="{{ route("empresa.show", $empresa->id)}}">Ver</a>
            <form action="{{ route("empresa.destroy", $empresa->id)}}" method="POST">
                @csrf
                @method('delete')
                <button type="submit">Eliminar</button>
            </form>
        </td>
        </tr>
            @endforeach
        </tbody>
    </table>
{{$empresas->links()}}
@endsection
