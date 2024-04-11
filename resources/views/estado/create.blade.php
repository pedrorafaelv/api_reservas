@extends('layout')

@section('content')
    <h1>Nuevo Estado</h1>
    <form action="{{ route('estado.store') }}" method="POST">
        @csrf
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre">
        <label for="entidad">Entidad</label>
        <input type="text" name="entidad" id="entidad">
        <button type="submit">Guardar</button>
    </form>
    @include('fragment._errors-form')
@endsection
