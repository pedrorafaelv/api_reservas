@extends('layout')
@section('content')
    <h1>Entidad</h1>
    <form action="{{ route('entidad.store') }}" method="POST">
        @csrf
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" value= "{{old("nombre", '')}}">
        <button type="submit">Guardar</button>
    </form>
    @include('fragment._errors-form')
@endsection
