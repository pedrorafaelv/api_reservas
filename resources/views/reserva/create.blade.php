@extends('layout')

@section('content')
    <h1>Nueva Reserva</h1>
    <form action="{{ route('reserva.store') }}" method="POST">
        @csrf
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre">
        <label for="empresa_id">Empresa</label>
        <input type="text" name="empresa_id" id="empresa_id">
        <label for="fecha_inicio">Fecha de inicio</label>
        <input type="date" name="fecha_inicio" id="fecha_inicio">
        <label for="fecha_fin">Fecha fin</label>
        <input type="date" name="fecha_fin" id="fecha_fin">
        <label for="cliente_id">Cliente</label>
        <input type="text" name="cliente_id" id="cliente_id">
        <label for="recurso_id">Cliente</label>
        <input type="text" name="recurso_id" id="recurso_id">
        <label for="estado_id">Estado</label>
        <input type="text" name="estado_id" id="estado_id">
        <button type="submit">Guardar</button>
    </form>
    @include('fragment._errors-form')
@endsection
