<@extends('layout')

@section('content')
    <h1>Nuevo Recurso</h1>
    <form action="{{ route('recurso.store') }}" method="POST">
        @csrf
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre">
        <label for="empresa_id">Empresa</label>
        <input type="text" name="empresa_id" id="empresa_id">
        <label for="tipo_recurso_id">Estado</label>
        <input type="text" name="tipo_recurso_id" id="tipo_recurso_id">
        <label for="estado_id">Estado</label>
        <input type="text" name="estado_id" id="estado_id">
        <label for="format_time_reserve">Tiempo de Reserva</label>
        <input type="text" name="format_time_reserve" id="format_time_reserve">

        <button type="submit">Guardar</button>
    </form>
    @include('fragment._errors-form')
<@endsection
