@extends('layout')

@section('content')
    <h1>Nuevo Recurso</h1>
    <form action="{{ route('recurso.store') }}" method="POST">
        @csrf
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" value= "{{old("nombre", '')}}">
        <label for="empresa_id">Empresa</label>
        <select name="empresa_id" id="empresa_id">
            @foreach ($empresas as $id=> $nombre)
            <option {{old("empresa_id", " ") == $id ? "selected" : "" }} value="{{$id}}">{{$nombre}}</option>
            @endforeach
        </select>
        <label for="tiporecurso_id">Tipo De Recurso</label>
        <select name="tipo_recurso_id" id="tipo_recurso_id">
            @foreach ($tiporecursos as $id=> $nombre)
            <option {{old("tipo_recurso_id", " ") == $id ? "selected" : "" }} value="{{$id}}">{{$nombre}}</option>
            @endforeach
        </select>
        <label for="estado_id">Estado</label>
        <select name="estado_id" id="estado_id">
            @foreach ($estados as $id=> $nombre)
            <option {{old("estado_id", " ") == $id ? "selected" : "" }} value="{{$id}}">{{$nombre}}</option>
            @endforeach
        </select>
        <label for="time_format_reserve">Tiempo de Reserva</label>
        <input type="text" name="time_format_reserve" id="time_format_reserve" value= "{{old("time_format_reserve", '')}}">

        <button type="submit">Guardar</button>
    </form>
    @include('fragment._errors-form')
@endsection
