@extends('layout')

@section('content')

<h1>Nueva Empresa</h1>
<form action="{{ route('empresa.store') }}" method="POST">
    @csrf
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" id="nombre">
    <label for="dir-0 eccion">Direccion:</label>
    <input type="text" name="direccion" id="direccion">
    <label for="telefono">Teléfono</label>
    <input type="text" name="telefono" id="telefono">
    <label for="email">E-mail:</label>
    <input type="text" name="email" id="email">
    <label for="industria">Industria:</label>
    <input type="text" name="industria_id" id="industria_id">
    <label for="fundacion">Fundación</label>
    <input type="date" name="fundacion" id="fundacion">
    <label for="ingresos">Ingreso</label>
    <input type="text" name="ingreso" id="ingreso">
    <label for="siteweb">SiteWeb</label>
    <input type="text" name="siteweb" id="siteweb">
    <label for="descripcion">Descripción:</label>
    <input type="text" name="descripcion" id="descripcion">
    <label for="timestart">Time Start:</label>
    <input type="time" name="Timestart" id="timestart">
    <label for="timeoff">Time Off:</label>
    <input type="time" name="timeoff" id="timeoff">
    <button type="submit">Guardar</button>
    </form>
    @include('fragment._errors-form')

    @endsection
