@extends('layout')

@section('content')
<h3>Listado de Industrias</h3>
<a href="{{ route("industria.create")}}">Nueva Industria</a>
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
            <a href="{{ route("industria.edit",['industrium'=> $industria->id])}}">Editar</a>
            <a href="{{ route("industria.show",['industrium' => $industria->id])}}">Ver</a>
             <form action="{{ route("industria.destroy", $industria->id)}}" method="post">
                @csrf
                @method('delete')
                <button type="submit">Eliminar</button>
             </form>
        </td>
        </tr>
            @endforeach

    </tbody>
</table>
{{$industrias->links()}}
@endsection
