@extends('layout')
@section('content')
<div class="custom-container">
    <a  class="btn-link" href="{{ route("tiporecurso.create")}}">Nuevo Tipo de Recurso</a>
</div>
<div class="custom-container">
    <div class=" grid grid_cols-5">
        <div class="col-start-2">
            <table>
                <thead>
                    <th class="table-header p-3">
                        <p class="header-tittle">
                            Nombre
                        </p>
                    </th>
                    <th class="table-header p-3">
                        <p class="header-tittle">
                            Acciones
                        </p>
                    </th>
                </thead>
                <tbody>
                    @foreach ($tiporecursos as $tiporecurso)
                    <tr>
                        <td class="col-start-2 p-3">{{$tiporecurso->nombre}}</td>
                        <td class="p-3">
                            <form action="{{ route("tiporecurso.destroy", $tiporecurso->id)}}" method="post">
                                <a class="btn-link" href="{{ route("tiporecurso.edit", $tiporecurso->id)}}"><i class="fas fa-edit"></i></a>
                                <a class="btn-link" href="{{ route("tiporecurso.show", $tiporecurso->id)}}"><i class="fas fa-eye"></i></a>
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn-link" ><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr class="table-footer">
                        <td>
                            {{$tiporecursos->links()}}
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
@endsection
