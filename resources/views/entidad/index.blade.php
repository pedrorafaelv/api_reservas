@extends('layout')
@section('content')
<div class="custom-container h-16">
    <a class="btn-link" href="{{ route("entidad.create")}}">Nueva Entidad</a>
</div>
<div class="custom-container">
    <div class="grid grid-cols-5">
        <div class="col-start-3">
            <table>
                <thead>
                    <th class="table-header p-4">
                        <p class="header-tittle">
                        Nombre
                        </p>
                    </th>
                    <th class="table-header p-4">
                        <p class="header-tittle">
                            Acciones
                        </p>
                    </th>
                </thead>
                <tbody>
                    @foreach ($entidads as $entidad)
                    <tr>
                        <td class="col-start-2 p-4">
                            {{$entidad->nombre}}
                        </td>
                        <td class="p-4">
                            <form action="{{ route("entidad.destroy", $entidad->id)}}" method="post">
                                <a class="btn-link" href="{{ route("entidad.edit", $entidad->id)}}"><i class="fas fa-edit"></i></a>
                                <a class= "btn-link" href="{{ route("entidad.show", $entidad->id)}}"><i class="fas fa-eye"></i></a>
                                @csrf
                                @method('delete')
                                <button  type="submit" class="btn-link"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr class= "table-footer">
                        <td>
                            {{$entidads->links()}}
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
@endsection
