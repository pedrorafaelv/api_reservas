@extends('layout')

@section('content')
{{--  <h3>Listado de Industrias</h3>  --}}
<div class="custom-container">
    <a class= "btn-primary" href="{{ route("industria.create")}}">Nueva Industria</a>
</div>
<div class="custom-container">
    <div class="grid grid-cols-2 gap-2 custom-grid">
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
    @foreach ($industrias as $industria)
    <div class="grid grid-cols-2 custom-grid">
        <div>{{$industria->nombre}}</div>
        <div class="p-1">
            <form action="{{ route("industria.destroy", $industria->id)}}" method="post">
                <a class= "btn-secondary" href="{{ route("industria.edit",['industrium'=> $industria->id])}}"><i class="fas fa-edit"></i></a>
                <a class= "btn-primary" href="{{ route("industria.show",['industrium' => $industria->id])}}"><i class="fas fa-eye"></i></a>
                @csrf
                @method('delete')
                <button type="submit" class="btn-danger"><i class="fas fa-trash-alt"></i></button>
            </form>
        </div>
    </div>
    @endforeach
    <div class= "table-footer">
        {{$industrias->links()}}
    </div>
</div>
@endsection
