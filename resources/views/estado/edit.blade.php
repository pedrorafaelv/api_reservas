@extends('layout')

@section('content')
    <h1>Actualizar Estado</h1>
    <form action="{{ route('estado.update', $estado->id) }}" method="POST">
        @csrf
        @method('put')
        <label for="entidad">Entidad</label>
        <input type="text" name="entidad" id="entidad" value = {{$estado->entidad}}>
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" value = {{$estado->nombre}}>
        <button type="submit">Guardar</button>
    </form>
    @include('fragment._errors-form')
@endsection
