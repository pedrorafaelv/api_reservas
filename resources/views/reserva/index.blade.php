@extends('layout')
@section('content')
<div class="custom-container h-12">
    <a class="btn-link" href="{{ route("reserva.create")}}">Nueva Reserva</a>
</div>

<div class="custom-container">
    <div class=" grid grid-cols-6">
{{--  {{print_r($events)}}  --}}
        <div id='calendar' class="col-span-3">
            <p> calendar </p>
        </div>
    </div>
    <div class=" grid grid-cols-5">
        {{--  <div class="col-start-2">

            <table class="table-auto">
                <thead>
                    <th class="table-header p-3">
                        <p class="header-tittle">
                            Empresa
                        </p>
                    </th>
                    <th class="table-header p-3">
                        <p class="header-tittle">
                    Fecha Inicio
                        </p>
                    </th>
                    <th class="table-header p-3">
                        <p class="header-tittle">
                            Fecha Fin
                        </p>
                    </th>
                    <th class="table-header p-3">
                        <p class="header-tittle">
                            Cliente
                        </p>
                    </th>
                    <th class="table-header p-3">
                        <p class="header-tittle">
                            Recurso
                        </p>
                    </th>
                    <th class="table-header p-3">
                        <p class="header-tittle">
                            Estado
                        </p>
                    </th>
                    <th class="table-header">
                        <p class="header-tittle">
                            Acciones
                        </p>
                    </th>
                </thead>
                <tbody>
                    @foreach ($reservas as $reserva)
                    <tr>
                        <td class="p-3">{{$empresas[$reserva->empresa_id]}}</td>
                        <td class="p-3">{{$reserva->fecha_inicio}}</td>
                        <td class="p-3">{{$reserva->fecha_fin}}</td>
                        <td class="p-3">{{$clientes[$reserva->cliente_id]}}</td>
                        <td class="p-3">{{$recursos[$reserva->recurso_id]}}</td>
                        <td class="p-3">{{$estados[$reserva->estado_id]}}</td>
                        <td class="p-3">
                            <form action="{{ route("reserva.destroy", $reserva->id)}}" method="post">
                                <a class="btn-link" href="{{ route("reserva.edit", $reserva->id)}}"><i class="fas fa-edit"></i></a>
                                <a class="btn-link" href="{{ route("reserva.show", $reserva->id)}}"><i class="fas fa-eye"></i></a>
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
                            {{$reservas->links()}}
                    </td>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>  --}}
</div>
@endsection
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth',
          editable: true,
          selectable: true,
          events: @json($events),
          dateClick: function(info) {
            // Maneja el evento de clic en una fecha
            alert('Date clicked: ' + info.dateStr);
            // Puedes agregar lógica adicional aquí, como abrir un modal
        },
        eventClick: function(info) {
            // Maneja el evento de clic en un evento
            alert('Event clicked: ' + info.event.title);
            // Puedes agregar lógica adicional aquí, como mostrar detalles del evento
        }
        });
        calendar.render();
      });

</script>
