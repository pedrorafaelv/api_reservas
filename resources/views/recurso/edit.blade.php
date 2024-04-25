@extends('layout')

@section('content')
    <h1>Actualizar Recurso</h1>
    <form action="{{ route('recurso.update',  $recurso) }}" method="POST">
        @csrf
        @method('put')
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" value ="{{$recurso->nombre}}">
        <label for="empresa_id">Empresa</label>
        <select name="empresa_id" id="empresa_id">
            @foreach ($empresas as $id=> $nombre)
            <option {{$recurso->empresa_id == $id ? 'selected':''}} value="{{$id}}">{{$nombre}}</option>
            @endforeach
        </select>
        <label for="tipo_recurso_id">Tipo de recurso</label>
        <select name="tipo_recurso_id" id="tipo_recurso_id">
            @foreach ($tiporecursos as $id=> $nombre)
            <option {{$recurso->tipo_recurso_id == $id ? 'selected':''}} value="{{$id}}">{{$nombre}}</option>
            @endforeach
        </select>
        <label for="estado_id">Estado</label>
        <select name="estado_id" id="estado_id">
            @foreach ($estados as $id=> $nombre)
            <option {{$recurso->estado_id == $id ? 'selected':''}} value="{{$id}}">{{$nombre}}</option>
            @endforeach
        </select>
        <label for="time_format_reserve">Tiempo de Reserva</label>
        <input type="text" name="time_format_reserve" id="time_format_reserve" value ="{{$recurso->time_format_reserve}}">

        <button type="submit">Guardar</button>
    </form>
    @include('fragment._errors-form')
@endsection
