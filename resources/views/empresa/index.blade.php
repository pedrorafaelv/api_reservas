@extends('layout')
@section('content')
 <h3>Listado de Empresas</h3>
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
          <td>{{$industrias[$empresa->industria_id]}}</td>
          <td>
            <a href="{{ route("empresa.edit", $empresa->id)}}">Editar</a>
            <a href="{{ route("empresa.create")}}">Crear</a>
            <a href="{{ route("empresa.destroy", $empresa->id)}}">Eliminar</a>
        </td>
        </tr>
            @endforeach
        </tbody>
    </table>
{{$empresas->links()}}
@endsection
