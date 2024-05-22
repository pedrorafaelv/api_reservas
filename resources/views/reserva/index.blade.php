@extends('layout')
@section('content')
<div class="custom-container">
    <a class="btn-primary" href="{{ route("reserva.create")}}">Nueva Reserva</a>
</div>

<div class="custom-container">
    <div class="grid grid-cols-7 custom-grid gap-1">
        <div class="table-header">
            <div class="header-tittle">
                Empresa
            </div>
        </div>
        <div class="table-header">
            <div class="header-tittle">
                Fecha Inicio
            </div>
        </div>
        <div class="table-header">
            <div class="header-tittle">
                Fecha Fin
            </div>
        </div>
        <div class="table-header">
            <div class="header-tittle">
                Cliente
            </div>
        </div>
        <div class="table-header">
            <div class="header-tittle">
                Recurso
            </div>
        </div>
        <div class="table-header">
            <div class="header-tittle">
                Estado
            </div>
        </div>
        <div class="table-header">
            <div class="header-tittle">
                Acciones
            </div>
        </div>
    </div>
    @foreach ($reservas as $reserva)
    <div class="grid grid-cols-7 gap-1 custom-grid">
        <div>{{$empresas[$reserva->empresa_id]}}</div>
        <div>{{$reserva->fecha_inicio}}</div>
        <div>{{$reserva->fecha_fin}}</div>
        <div>{{$clientes[$reserva->cliente_id]}}</div>
        <div>{{$recursos[$reserva->recurso_id]}}</div>
        <div>{{$estados[$reserva->estado_id]}}</div>
        <div class="p-1">
            <form action="{{ route("reserva.destroy", $reserva->id)}}" method="post">
                <a class="btn-secondary" href="{{ route("reserva.edit", $reserva->id)}}"><i class="fas fa-edit"></i></a>
                <a class="btn-primary" href="{{ route("reserva.show", $reserva->id)}}"><i class="fas fa-eye"></i></a>
                @csrf
                @method('delete')
                <button type="submit" class="btn-danger"><i class="fas fa-trash-alt"></i></button>
            </form>
        </div>
    </div>
    @endforeach
    <div  class= "table-footer">
        {{$reservas->links()}}
    </div>
</div>
@endsection
