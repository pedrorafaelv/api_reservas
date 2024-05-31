@extends('layout')

@section('content')
<div class="custom-container h-16">
    <a class="btn-link" href="{{ route("recurso.create")}}">Nuevo Recurso</a>
</div>
<div class="custom-container">
    <div class=" grid grid_cols-5">
        <div class="col-start-2">
            <table>
                <thead>
                    <th class="table-header p-3">
                        <p class="header-tittle">
                            Empresa
                        </p>
                    </th>
                    <th class="table-header p-3">
                        <p class="header-tittle">
                            Tipo Recurso
                        </p>
                    </th>
                    <th class="table-header p-3">
                        <p class="header-tittle">
                            Nombre
                        </p>
                    </th>
                    <th class="table-header p-3">
                        <p class="header-tittle">
                            Estado
                        </p>
                    </th>
                    <th class="table-header p-3">
                        <p class="header-tittle">
                            Formato de Tiempo
                        </p>
                    </th>
                    <th class="table-header p-3">
                        <p class="header-tittle">
                            Acciones
                        </p>
                    </th>
                </thead>
                <tbody>
                    @foreach ($recursos as $recurso)
                    <tr>
                        <td class="p-3">{{$recurso->empresa->nombre}}</td>
                        <td class="p-3">{{$recurso->tiporecurso->nombre}}</td>
                        <td class="p-3">{{$recurso->nombre}}</td>
                        <td class="p-3">{{$recurso->estado->nombre}}</td>
                        <td class="p-3">{{$recurso->time_format_reserve}}</td>
                        <td class="p-3" class="p-1">
                        <form action="{{ route("recurso.destroy", $recurso->id)}}" method="post">
                            <a class="btn-link" href="{{ route("recurso.edit", $recurso->id)}}"><i class="fas fa-edit"></i></a>
                            <a class="btn-link"href="{{ route("recurso.show", $recurso->id)}}"><i class="fas fa-eye"></i></a>
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn-link"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr class= "table-footer">
                        <td>
                            {{$recursos->links()}}
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
@endsection

