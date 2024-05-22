@extends('layout')
@section('content')
<div class="custom-container">
    <a class="btn-primary" href="{{ route("estado.create")}}">Nuevo Estado</a>
</div>
<div class="custom-container">
    <div class="grid grid-cols-3 gap-1 custom-grid">
        <div class="table-header">
            <div class="header-tittle">
                Entidad
            </div>
        </div>
        <div class="table-header">
            <div class="header-tittle">
                Nombre
            </div>
        </div>
        <div class="table-header">
            <div class="header-tittle">
                Acciones
            </div>
        </div>
    </div>
    @foreach ($estados as $estado)
    <div class="grid grid-cols-3 custom-grid">
        <div>{{$estado->tipoRecurso->nombre}}</div>
        <div>{{$estado->nombre}}</div>
        <div class="p-1">
            <form action="{{ route("estado.destroy", $estado->id)}}" method="post">
          <a class= "btn-secondary" href="{{ route("estado.edit", $estado->id)}}"> <i class="fas fa-edit"></i></a>
          <a  class="btn-primary" href="{{ route("estado.show", $estado->id)}}"><i class="fas fa-eye"></i></a>
              @csrf
              @method('delete')
              <button type="submit" class="btn-danger" ><i class="fas fa-trash-alt"></i></button>
           </form>
        </div>
    </div>
    @endforeach
    <div class="table-footer">
        {{$estados->links()}}
    </div>
</div>
@endsection
