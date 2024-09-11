@extends('layout')
@section('content')
 <div class="custom-container h-16">
     <a  class= "btn-link" href="{{ route("empresa.create")}}">Nueva Empresa</a>
 </div>
<div class="custom-container">
    <div class=" grid grid-cols-5">
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
                           Dirección
                       </p>
                   </th>
                   <th class="table-header p-3">
                       <p class="header-tittle">
                           Teléfono
                       </p>
                   </th>
                   <th class="table-header p-3">
                       <p class="header-tittle">
                           Email
                       </p>
                   </th>
                   <th class="table-header p-3">
                       <p class="header-tittle">
                           Industria
                       </p>
                   </th>
                   <th class="table-header p-3">
                       <p class="header-tittle">
                           Acciones
                       </p>
                   </th>
               </thead>
               <tbody>
                   @foreach ($empresas as $empresa)
                   <tr>
                       <td class="p-3">{{$empresa->nombre}}</td>
                       <td class="p-3">{{$empresa->direccion}}</td>
                       <td class="p-3">{{$empresa->telefono}}</td>
                       <td class="p-3">{{$empresa->email}}</td>
                       <td class="p-3">{{$empresa->industria->nombre}}</td>
                       <td class="p-3" class="p-1">
                           <form action="{{ route("empresa.destroy", $empresa->id)}}" method="POST">
                           <a class="btn-link" href="{{ route("empresa.edit", $empresa->id)}}"><i class="fas fa-edit"></i></a>
                           <a class="btn-link" href="{{ route("empresa.show", $empresa->id)}}"><i class="fas fa-eye"></i></a>
                               @csrf
                               @method('delete')
                               <button type="submit"  class="btn-link"> <i class="fas fa-trash-alt"></i></button>
                           </form>
                       </td>
                   </tr>
                   @endforeach
               </tbody>
               <tfoot>
                   <tr class= "table-footer">
                       <td class="col-span-12">
                           {{$empresas->links()}}
                       </td>
                   </tr>
               </tfoot>
           </table>
        </div>
    </div>
</div>
@endsection
