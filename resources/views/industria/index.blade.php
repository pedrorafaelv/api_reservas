@extends('layout')

@section('content')
{{--  <h3>Listado de Industrias</h3>  --}}
<div class="custom-container h-16">
    <a class= "btn-link" href="{{ route("industria.create")}}">Nueva Industria</a>
</div>
<div class="custom-container">

    <div class=" grid grid-cols-5">
               <div class="col-start-3">


            <table>
                <thead>
                    <th class="table-header p-2">
                        <p class="header-tittle">
                            Nombre
                        </p>
                    </th>
                    <th class="table-header p-2">
                        <p class="header-tittle">
                            Acciones
                        </p>
                    </th>
                </thead>
                <tbody>
                    @foreach ($industrias as $industria)
                    <tr class="">
                        <td class="p-2">{{$industria->nombre}}</td>
                        <td class="p-2" >
                            <form action="{{ route("industria.destroy", $industria->id)}}" method="post">
                                <a class= "btn-link" href="{{ route("industria.edit",['industrium'=> $industria->id])}}"><i class="fas fa-edit"></i></a>
                                <a class= "btn-link" href="{{ route("industria.show",['industrium' => $industria->id])}}"><i class="fas fa-eye"></i></a>
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn-link"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td>
                            {{$industrias->links()}}
                        </td>
                    </tr>
                </tfoot>

            </table>
        </div>
    </div>
</div>
@endsection

