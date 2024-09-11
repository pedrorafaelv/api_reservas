@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Calendario de Reservas</h1>
    <div id="calendar"></div>
</div>
@endsection

<script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
              initialView: 'dayGridMonth',
              editable: true,
              selectable: true,
            });
            calendar.render();
          });
</script>
