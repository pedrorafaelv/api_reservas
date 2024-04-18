@extends('layout')

@section('content')

<h1>Actualizar  Empresa: {{$empresa->nombre}}</h1>
<form action="{{ route('empresa.update',$empresa->id) }}" method="POST">
    @csrf
    @method('put')
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" id="nombre" value = {{$empresa->nombre}}>
    <label for="dir-0 eccion">Direccion:</label>
    <input type="text" name="direccion" id="direccion" value = {{$empresa->direccion}}>
    <label for="telefono">Teléfono</label>
    <input type="text" name="telefono" id="telefono" value = {{$empresa->telefono}}>
    <label for="email">E-mail:</label>
    <input type="text" name="email" id="email" value = {{$empresa->email}}>
    <label for="industria_id">Industria:</label>
    <select name="industria_id" id="industria_id">
        @foreach ($industrias as $id=> $nombre)
        <option {{$empresa->industria_id == $id ? 'selected':''}} value="{{$id}}">{{$nombre}}</option>
        @endforeach
    </select>
    <label for="fundacion">Fundación</label>
    <input type="date" name="fundacion" id="fundacion" value = {{$empresa->fundacion}}>
    <label for="ingresos">Ingreso</label>
    <input type="text" name="ingreso" id="ingreso" value = {{$empresa->ingreso}}>
    <label for="sitio_web">Site Web</label>
    <input type="text" name="sitio_web" id="sitio_web" value = {{$empresa->siteweb}}>
    <label for="descripcion">Descripción:</label>
    <input type="text" name="descripcion" id="descripcion" value = {{$empresa->descripcion}}>
    <label for="timestart">Time Start:</label>
    <input type="time" name="time_start" id="time_start" value = {{$empresa->time_start}}>
    <label for="timeoff">Time Off:</label>
    <input type="time" name="time_off" id="time_off" value = {{$empresa->time_off}}>
    <button type="submit">Guardar</button>
    </form>
    @include('fragment._errors-form')

    @endsection
