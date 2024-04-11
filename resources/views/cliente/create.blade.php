@extends('layout')

@section('content')
    <h1>Nuevo Cliente</h1>
    <form action="{{ route('cliente.store') }}" method="POST">
        @csrf
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre">
        <label for="telefono">Teléfono</label>
        <input type="text" name="telefono" id="telefono">
        <label for="email">E-mail:</label>
        <input type="text" name="email" id="email">

        <button type="submit">Guardar</button>
    </form>
    @include('fragment._errors-form')
@endsection
