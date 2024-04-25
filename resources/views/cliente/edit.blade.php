@extends('layout')

@section('content')
    <h1>Actualizar Cliente: {{$cliente->nombre}}</h1>
    <form action="{{ route('cliente.update', $cliente->id) }}" method="POST">
        @csrf
        @method('put')
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" value = "{{$cliente->nombre}}">
        <label for="telefono">Teléfono</label>
        <input type="text" name="telefono" id="telefono" value = "{{$cliente->telefono}}">
        <label for="email">E-mail:</label>
        <input type="text" name="email" id="email" value ="{{$cliente->email}}">
        <button type="submit">Guardar</button>
    </form>
    @include('fragment._errors-form')
@endsection

