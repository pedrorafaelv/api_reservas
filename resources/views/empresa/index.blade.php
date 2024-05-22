@extends('layout')
@section('content')
 <div class="custom-container">
     <a  class= "btn-primary" href="{{ route("empresa.create")}}">Nueva Empresa</a>
 </div>
<div class="custom-container">
    <div class="grid grid-cols-6 gap-1 custom-grid">
        <div class="table-header">
            <p class="header-tittle">
                Nombre
            </p>
        </div>
        <div class="table-header">
            <p class="header-tittle">
                Dirección
            </p>
        </div>
        <div class="table-header">
            <p class="header-tittle">
                Teléfono
            </p>
        </div>
        <div class="table-header">
            <p class="header-tittle">
                Email
            </p>
        </div>
        <div class="table-header">
            <p class="header-tittle">
                Industria
            </p>
        </div>
        <div class="table-header">
            <p class="header-tittle">
                Acciones
            </p>
        </div>
    </div>
    @foreach ($empresas as $empresa)
    <div class="grid grid-cols-6 gap-2 custom-grid">
        <div>{{$empresa->nombre}}</div>
        <div>{{$empresa->direccion}}</div>
        <div>{{$empresa->telefono}}</div>
        <div>{{$empresa->email}}</div>
        <div>{{$empresa->industria->nombre}}</div>
        <div class="p-1">
            <form action="{{ route("empresa.destroy", $empresa->id)}}" method="POST">
            <a class="btn-secondary" href="{{ route("empresa.edit", $empresa->id)}}"><i class="fas fa-edit"></i></a>
            <a class="btn-primary" href="{{ route("empresa.show", $empresa->id)}}"><i class="fas fa-eye"></i></a>
                @csrf
                @method('delete')
                <button type="submit"  class="btn-danger"> <i class="fas fa-trash-alt"></i></button>
            </form>
        </div>
    </div>
    @endforeach
    <div class="table-footer">
        {{$empresas->links()}}
    </div>
</div>
@endsection
