@extends('layout')

@section('content')
    <h1>Nuevo Cliente</h1>
    <form action="{{ route('cliente.store') }}" method="POST">
        @csrf
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" value= "{{old("nombre", 'Sin Nombre')}}">
        <label for="telefono">Teléfono</label>
        <input type="text" name="telefono" id="telefono" value= "{{old("telefono", 'Sin Nombre')}}">
        <label for="email">E-mail:</label>
        <input type="text" name="email" id="email" value= "{{old("email", 'Sin Nombre')}}">
        <button type="submit">Guardar</button>
    </form>
    @include('fragment._errors-form')
@endsection
