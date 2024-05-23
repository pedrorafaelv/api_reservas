@extends('layout')
@section('content')
<div class="custom-container">
    <a  class="btn-primary" href="{{ route("tiporecurso.create")}}">Nuevo Tipo de Recurso</a>
</div>
<div class="custom-container">
    <div class="grid grid-cols-4 gap-2 custom-grid">
        <div class ="table-header  col-start-2">
            <p class="header-tittle">
                Nombre
            </p>
        </div>
        <div class ="table-header">
            <p class="header-tittle">
                Acciones
            </p>
        </div>
    </div>
    @foreach ($tiporecursos as $tiporecurso)
    <div class="grid grid-cols-4 gap-2 custom-grid">
        <div class="col-start-2">{{$tiporecurso->nombre}}</div>
        <div class="p-1">
            <form action="{{ route("tiporecurso.destroy", $tiporecurso->id)}}" method="post">
                <a class="btn-secondary" href="{{ route("tiporecurso.edit", $tiporecurso->id)}}"><i class="fas fa-edit"></i></a>
                <a class="btn-primary" href="{{ route("tiporecurso.show", $tiporecurso->id)}}"><i class="fas fa-eye"></i></a>
                @csrf
                @method('delete')
                <button type="submit" class="btn-danger" ><i class="fas fa-trash-alt"></i></button>
            </form>
        </div>
    </div>
    @endforeach
    <div class="table-footer">
      {{$tiporecursos->links()}}
    </div>
</div>
@endsection
