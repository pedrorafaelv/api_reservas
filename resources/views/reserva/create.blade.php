@extends('layout')

@section('content')
    <h1>Nueva Reserva</h1>
    <form action="{{ route('reserva.store') }}" method="POST">
        @csrf
        {{--  <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" value= "{{old("nombre", 'Sin Nombre')}}">  --}}
        <label for="empresa_id">Empresa</label>
        <select name="empresa_id" id="empresa_id">
            @foreach ($empresas as $id=> $nombre)
            <option {{old("empresa_id", " ") == $id ? "selected" : "" }} value="{{$id}}">{{$nombre}}</option>
            @endforeach
        </select>
        <label for="fecha_inicio">Fecha de inicio</label>
        <input type="date" name="fecha_inicio" id="fecha_inicio" value= "{{old("fecha_inicio")}}">
        <label for="fecha_fin">Fecha fin</label>
        <input type="date" name="fecha_fin" id="fecha_fin" value= "{{old("fecha_fin")}}">
        <label for="cliente_id">Cliente</label>
        <select name="cliente_id" id="cliente_id">
            @foreach ($clientes as $id=> $nombre)
            <option {{old("cliente_id", " ") == $id ? "selected" : "" }} value="{{$id}}">{{$nombre}}</option>
            @endforeach
        </select>
        <label for="recurso_id">Recurso</label>
        <select name="recurso_id" id="recurso_id">
            @foreach ($recursos as $id=> $nombre)
            <option {{old("recurso_id", " ") == $id ? "selected" : "" }} value="{{$id}}">{{$nombre}}</option>
            @endforeach
        </select>
        <label for="estado_id">Estado</label>
        <select name="estado_id" id="estado_id">
            @foreach ($estados as $id=> $nombre)
            <option {{old("estado_id", " ") == $id ? "selected" : "" }} value="{{$id}}">{{$nombre}}</option>
            @endforeach
        </select>
        <button type="submit">Guardar</button>
    </form>
    @include('fragment._errors-form')
@endsection