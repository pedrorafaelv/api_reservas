@extends('layout')
@section('content')
    <h1>Editar Entidad</h1>
    <form action="{{ route('entidad.update', $entidad->id) }}" method="POST">
        @csrf
        @method('put')
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" value= "{{old("nombre", $entidad->nombre)}}">
        <button type="submit">Guardar</button>
    </form>
    @include('fragment._errors-form')
@endsection
