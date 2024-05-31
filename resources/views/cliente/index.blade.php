@extends('layout')

@section('content')
<div class="custom-container h-16">
    <a class="btn-link " href="{{ route("cliente.create")}}"  title="Nuevo">   <i class="fa-solid fa-square-plus"></i>  Nuevo Cliente</a>
</div>

<div class="custom-container">
    <div class=" grid grid-cols-4">
        <div class="col-start-2">
            <table class="table-fixed">
                <thead>
                    <th class="table-header p-4">
                        <p class="header-tittle">
                            Nombre
                        </p>
                    </th>
                    <th class="table-header p-4">
                        <p class="header-tittle">
                            Teléfono
                        </p>
                    </th>
                    <th class="table-header p-4">
                        <p class="header-tittle">
                            Email
                        </p>
                    </th>
                    <th class="table-header p-4">
                        <p class="header-tittle">
                            Acciones
                        </p>
                    </th>
                </thead>
                <tbody>
                    @foreach ($clientes as $cliente)
                    <tr>
                        <td class="p-3">{{$cliente->nombre}}</td>
                        <td class="p-3">{{$cliente->telefono}}</td>
                        <td class="p-3">{{$cliente->email}}</td>
                        <td class="p-3" class="p-1">
                            <form action="{{ route("cliente.destroy", $cliente)}}" method="post">
                                <a class= "btn-link " href="{{ route("cliente.edit", $cliente->id)}}" title="Editar"><i class="fas fa-edit"></i></a>
                                <a class="btn-link " href="{{ route("cliente.show", $cliente->id)}}"  title="ver"> <i class="fas fa-eye"></i></a>
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn-link"  title="eliminar"><i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td class="table-footer col-span-4">
                        {{$clientes->links()}}
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
@endsection
