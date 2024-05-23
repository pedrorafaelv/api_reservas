@extends('layout')
@section('content')
<div class="custom-container">
    <a class="btn-primary" href="{{ route("entidad.create")}}">Nueva Entidad</a>
</div>
<div class="custom-container">
    <div class="grid grid-cols-4 custom-grid">
        <div class="table-header col-start-2">
            <div class="header-tittle">
                Nombre
            </div>
        </div>
        <div class="table-header ">
            <div class="header-tittle">
                Acciones
            </div>
        </div>
    </div>
    @foreach ($entidads as $entidad)
    <div class="grid grid-cols-4 custom-grid">
        <div class="col-start-2">
            {{$entidad->nombre}}
        </div>
        <div class="p-1">
            <form action="{{ route("entidad.destroy", $entidad->id)}}" method="post">
                <a class="btn-secondary" href="{{ route("entidad.edit", $entidad->id)}}"><i class="fas fa-edit"></i></a>
                <a class= "btn-primary" href="{{ route("entidad.show", $entidad->id)}}"><i class="fas fa-eye"></i></a>
            @csrf
            @method('delete')
            <button  type="submit" class="btn-danger"><i class="fas fa-trash-alt"></i></button>
            </form>
        </div>
    </div>
    @endforeach
    <div class="table-footer">
        {{$entidads->links()}}
    </div>
</div>
@endsection
