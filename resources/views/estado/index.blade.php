@extends('layout')
@section('content')
<div class="custom-container h-16">
    <div class="grid grid-cols-5">
        <div>
            <a class="btn-primary" href="{{ route("estado.create")}}">Nuevo Estado</a>
        </div>
        <div class="">
            <label class="custom-label" for="filtar">Fitrar</label>
            <select class="input-custom" placeholder="Filtrar"  name="filtro" id="filtro" onchange="" title="Filtrar">
                @foreach ($tiporecursos as $id=> $nombre)
                <option {{old("tipo_recurso_id", " ") == $id ? "selected" : "" }} value="{{$id}}">{{$nombre}}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
<div class="custom-container">
    <div class="grid grid-cols-3 gap-1 custom-grid">
        <div class="table-header">
            <div class="header-tittle">
                Tipo de Recurso
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
