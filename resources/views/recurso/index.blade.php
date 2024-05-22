@extends('layout')

@section('content')
<div class="custom-container">
    <a class="btn-primary" href="{{ route("recurso.create")}}">Nuevo Recurso</a>
</div>
<div class="custom-container">
    <div class="grid grid-cols-6 gap-1 custom-grid">
        <div class="table-header">
            <div class="header-tittle">
                Empresa
            </div>
        </div>
        <div class="table-header">
            <div class="header-tittle">
                Tipo Recurso
            </div>
        </div>
        <div class="table-header">
            <div class="header-tittle">
                Nombre
            </div>
        </div>
        <div class="table-header">
            <div class="header-tittle">
                Estado
            </div>
        </div>
        <div class="table-header">
            <div class="header-tittle">
                Formato Tiempo
            </div>
        </div>
        <div class="table-header">
            <div class="header-tittle">
                Acciones
            </div>
        </div>
    </div>
    @foreach ($recursos as $recurso)
    <div class=" grid grid-cols-6 gap-1 custom-grid">
        <div>{{$recurso->empresa->nombre}}</div>
        <div>{{$recurso->tiporecurso->nombre}}</div>
        <div>{{$recurso->nombre}}</div>
        <div>{{$recurso->estado->nombre}}</div>
        <div>{{$recurso->time_format_reserve}}</div>
        <div class="p-1">
        <form action="{{ route("recurso.destroy", $recurso->id)}}" method="post">
            <a class="btn-secondary" href="{{ route("recurso.edit", $recurso->id)}}"><i class="fas fa-edit"></i></a>
            <a class="btn-primary"href="{{ route("recurso.show", $recurso->id)}}"><i class="fas fa-eye"></i></a>
                @csrf
                @method('delete')
                <button type="submit" class="btn-danger"><i class="fas fa-trash-alt"></i></button>
            </form>
        </div>
    </div>
    @endforeach
     <div class="table-footer">
         {{$recursos->links()}}
     </div>
</div>
@endsection

