@extends('layout')
@section('content')
<div class="custom-container h-16">
    <div class="grid grid-cols-5">
        <div>
            <a class="btn-link" href="{{ route("estado.create")}}">Nuevo Estado</a>
        </div>
        <div class="">
            <label class="custom-label" for="filtar">Fitrar</label>
            <select class="input-custom" placeholder="Filtrar"  name="filtro" id="filtro" onchange="" title="Filtrar">
                @foreach ($tiporecursos as $id=> $nombre)
                <option {{old("tipo_recurso_id", " ") == $id ? "selected" : "" }} value="{{$id}}">{{$nombre}}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
<div class="custom-container">
    <div class=" grid grid-cols-5">
           <div class="col-start-3">
               <table class="table-auto">
                   <thead>
                       <th class="table-header p-3">
                           <p class="header-tittle"> Tipo de Recurso </p>
                       </th>
                       <th class="table-header p-3">
                           <p class="header-tittle"> Tipo de Recurso </p>
                       </th>
                       <th class="table-header p-3">
                           <p class="header-tittle"> Acciones </p>
                       </th>
                   </thead>
                   <tbody>
                       @foreach ($estados as $estado)
                           <tr>
                               <td class="p-2">{{$estado->tipoRecurso->nombre}}</td>
                               <td class="p-2">{{$estado->nombre}}</td>
                               <td class="p-2" class="p-1">
                                   <form action="{{ route("estado.destroy", $estado->id)}}" method="post">
                               <a class= "btn-link" href="{{ route("estado.edit", $estado->id)}}"> <i class="fas fa-edit"></i></a>
                               <a  class="btn-link" href="{{ route("estado.show", $estado->id)}}"><i class="fas fa-eye"></i></a>
                                   @csrf
                                   @method('delete')
                                   <button type="submit" class="btn-link" ><i class="fas fa-trash-alt"></i></button>
                               </form>
                               </td>
                           </tr>
                       @endforeach
                   </tbody>
                   <tfoot>
                       <tr class= "table-footer">
                           <td>
                               {{$estados->links()}}
                           </td>
                       </tr>
                   </tfoot>
               </table>
           </div>
    </div>
</div>
@endsection
