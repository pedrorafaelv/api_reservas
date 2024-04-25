@extends('layout')

@section('content')
    <h1>Actualizar Reserva: {{$reserva->id}}</h1>
    <form action="{{ route('reserva.update', $reserva) }}" method="POST">
        @csrf
        @method('put')
        <label for="empresa_id">Empresa</label>
        <select name="empresa_id" id="empresa_id">
            @foreach ($empresas as $id=> $nombre)
            <option {{$reserva->empresa_id == $id ? "selected" : "" }} value="{{$id}}">{{$nombre}}</option>
            @endforeach
        </select>
        <label for="fecha_inicio">Fecha de inicio</label>
        <input type="datetime-local" name="fecha_inicio" id="fecha_inicio" value= "{{old ('fecha_inicio', date('Y-m-d\TH:i', strtotime($reserva->fecha_inicio)))}}">
        <label for="fecha_fin">Fecha fin</label>
        <input type="datetime-local" name="fecha_fin" id="fecha_fin" value ="{{old('fecha_fin', date('Y-m-d\TH:i', strtotime($reserva->fecha_fin)))}}">
        <label for="cliente_id">Cliente</label>
        <select name="cliente_id" id="cliente_id">
            @foreach ($clientes as $id=> $nombre)
            <option {{old("cliente_id", "$reserva->cliente_id") == $id ? "selected" : "" }} value="{{$id}}">{{$nombre}}</option>
            @endforeach
        </select>
        <label for="recurso_id">Recurso</label>
        <select name="recurso_id" id="recurso_id">
            @foreach ($recursos as $id=> $nombre)
            <option {{old("recurso_id", "$reserva->recurso_id") == $id ? "selected" : "" }} value="{{$id}}">{{$nombre}}</option>
            @endforeach
        </select>
        <label for="estado_id">Estado</label>
        <select name="estado_id" id="estado_id">
            @foreach ($estados as $id=> $nombre)
            <option {{old("estado_id", " $reserva->estado_id") == $id ? "selected" : "" }} value="{{$id}}">{{$nombre}}</option>
            @endforeach
        </select>
        <button type="submit">Guardar</button>
    </form>
    @include('fragment._errors-form')
@endsection
