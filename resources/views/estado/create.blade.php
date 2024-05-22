@extends('layout')

@section('content')
    <h1>Nuevo Estado</h1>
    <form action="{{ route('estado.store') }}" method="POST">
        @csrf
        <label for="tipo_recurso_id">Entidad</label>
        <select name="tipo_recurso_id" id="tipo_recurso_id">
            @foreach ($tiporecursos as $id=> $nombre)
            <option {{old("tipo_recurso_id", " ") == $id ? "selected" : "" }} value="{{$id}}">{{$nombre}}</option>
            @endforeach
        </select>
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" value= "{{old("nombre", 'Sin nombre')}}">
        <button type="submit">Guardar</button>
    </form>
    @include('fragment._errors-form')
@endsection
