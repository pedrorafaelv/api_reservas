@extends('layout')

@section('content')
<div class="custom-container">
    <a class="btn-primary " href="{{ route("cliente.create")}}"  title="Nuevo">   <i class="fa-solid fa-square-plus"></i>  Nuevo Cliente</a>
</div>

<div class="custom-container">
    <div class="grid grid-cols-4 custom-grid">
        <div class="table-header">
            <div class="header-tittle">
                Nombre
            </div>
        </div>
        <div class="table-header">
            <div class="header-tittle">
                Tel&eacute;fono
            </div>
        </div>
        <div class="table-header">
            <div class="header-tittle">
                @Email
            </div>
        </div>
        <div class="table-header">
            <div class="header-tittle">
                Acciones
            </div>
        </div>
    </div>
    @foreach ($clientes as $cliente)
    <div class="grid grid-cols-4 gap-2 custom-grid">
        <div>{{$cliente->nombre}}</div>
        <div>{{$cliente->telefono}}</div>
        <div>{{$cliente->email}}</div>
        <div class="p-1">
            <form action="{{ route("cliente.destroy", $cliente)}}" method="post">
                <a class= "btn-secondary " href="{{ route("cliente.edit", $cliente->id)}}" title="Editar"><i class="fas fa-edit"></i></a>
                <a class="btn-primary " href="{{ route("cliente.show", $cliente->id)}}"  title="ver"> <i class="fas fa-eye"></i></a>
                @csrf
                @method('delete')
                <button type="submit" class="btn-danger"  title="eliminar"><i class="fas fa-trash-alt"></i>
                </button>
            </form>
        </div>
    </div>
    @endforeach
    <div class="table-footer">
        {{$clientes->links()}}
    </div>
</div>
@endsection
