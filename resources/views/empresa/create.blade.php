@extends('layout')

@section('content')

<h1>Nueva Empresa</h1>
<form action="{{ route('empresa.store') }}" method="POST">
    @csrf
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" id="nombre" value= "{{old("nombre", 'Sin Nombre')}}">
    <label for="dir-0 eccion">Direccion:</label>
    <input type="text" name="direccion" id="direccion" value= "{{old("direccion")}}">
    <label for="telefono">Teléfono</label>
    <input type="text" name="telefono" id="telefono" value= "{{old("telefono")}}">
    <label for="email">E-mail:</label>
    <input type="text" name="email" id="email" value= "{{old("email")}}">
     <label for="industria">Industria:</label>
    <select name="industria_id" id="industria_id">
        @foreach ($industrias as $id=> $nombre)
        <option {{old("industria_id", " ") == $id ? "selected" : "" }} value="{{$id}}">{{$nombre}}</option>
        @endforeach
    </select>
    <label for="fundacion">Fundación</label>
    <input type="date" name="fundacion" id="fundacion" value= "{{old("fundacion")}}">
    <label for="ingresos">Ingreso</label>
    <input type="text" name="ingreso" id="ingreso" value= "{{old("ingreso")}}">
    <label for="sitio_web">SiteWeb</label>
    <input type="text" name="sitio_web" id="sitio_web" value= "{{old("sitio_web")}}">
    <label for="descripcion">Descripción:</label>
    <input type="text" name="descripcion" id="descripcion" value= "{{old("descripcion")}}">
    <label for="time_start">Time Start:</label>
    <input type="time" name="time_start" id="times_start" value= "{{old("times_start")}}">
    <label for="time_off">Time Off:</label>
    <input type="time" name="time_off" id="time_off" value= "{{old("time_off")}}">
    <button type="submit">Guardar</button>
    </form>
    @include('fragment._errors-form')

    @endsection
