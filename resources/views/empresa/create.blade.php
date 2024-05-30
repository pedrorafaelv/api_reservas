@extends('layout')

@section('content')
<div class="custom-container">
    <h3>Nueva Empresa</h3>
</div>
<div class="custom-container">

    <form action="{{ route('empresa.store') }}" method="POST">
    @csrf
    <div class="grid grid-cols-4 gap-1 custom-grid">
        <div class="div-square">
            <label class="custom-label" for="nombre">Nombre:</label>
            <input class="input-custom" placeholder="nombre" type="text" name="nombre" id="nombre" value= "{{old("nombre", '')}}">
        </div>
        <div class="div-square">
            <label class="custom-label" for="direccion">Direccion:</label>
            <input class="input-custom" placeholder="direccion" type="text" name="direccion" id="direccion" value= "{{old("direccion")}}">
        </div>
        <div class="div-square">
            <label class="custom-label" for="telefono">Teléfono</label>
            <input class="input-custom" placeholder="telefono" type="text" name="telefono" id="telefono" value= "{{old("telefono")}}">
        </div>
        <div class="div-square">
            <label class="custom-label" for="email">E-mail:</label>
            <input class="input-custom" placeholder="email" type="text" name="email" id="email" value= "{{old("email")}}">
        </div>
    </div>
    <div class="grid grid-cols-4 custom-grid">
        <div class="div-square">
            <label class="custom-label" for="industria">Industria:</label>
            <select class="input-custom" name="industria_id" id="industria_id">
                @foreach ($industrias as $id=> $nombre)
                <option {{old("industria_id", " ") == $id ? "selected" : "" }} value="{{$id}}">{{$nombre}}</option>
                @endforeach
            </select>
        </div>
        <div class="div-square">
            <label class="custom-label" for="fundacion">Fundación</label>
            <input class="input-custom" placeholder="fundacion" type="date" name="fundacion" id="fundacion" value= "{{old("fundacion")}}">
        </div>
        <div class="div-square">
            <label class="custom-label" for="ingresos">Ingreso</label>
            <input class="input-custom" placeholder="ingreso" type="text" name="ingreso" id="ingreso" value= "{{old("ingreso")}}">
        </div>
        <div class="div-square">
            <label class="custom-label" for="sitio_web">SiteWeb</label>
            <input class="input-custom" placeholder="sitio_web" type="text" name="sitio_web" id="sitio_web" value= "{{old("sitio_web")}}">
        </div>
    </div>
    <div class="grid grid-cols-4 custom-grid">
        <div class="div-square">
            <label class="custom-label" for="descripcion">Descripción:</label>
            <input class="input-custom" placeholder="descripcion" type="text" name="descripcion" id="descripcion" value= "{{old("descripcion")}}">
        </div>
        <div class="div-square">
            <label class="custom-label" for="time_start">Time Start:</label>
            <input class="input-custom" placeholder="time_start" type="time" name="time_start" id="time_start" value= "{{old("time_start")}}">
        </div>
        <div class="div-square">
            <label class="custom-label" for="time_off">Time Off:</label>
            <input class="input-custom" placeholder="time_off" type="time" name="time_off" id="time_off" value= "{{old("time_off")}}">
        </div>
    </div>
    <div class="grid grid-cols-5 custom-grid">
        <div class="div-square col-start-3">
            <button class="btn-primary" type="submit">Guardar</button>
        </div>
    </div>
    </form>
    @include('fragment._errors-form')

</div>
    @endsection
