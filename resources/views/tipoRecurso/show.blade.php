extends('layout')
@section('content')
<h3>Detalle del Tipo de recurso: {{$tiporecurso->nombre}}</h3>
<table>
    <thead>
        <td>Id</td>
        <td>Nombre</td>
    </thead>
    <tbody>
        <tr>
          <td>{{$tiporecurso->id}}</td>
          <td>{{$tiporecurso->nombre}}</td>

        </tr>

    </tbody>
</table>
@endsection
