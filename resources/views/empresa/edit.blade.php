@extends('layout')

@section('content')
<div class="custom-container p-1">
    <h3>Actualizar  Empresa: {{$empresa->nombre}}</h3>
</div>
<div class="custom-container">
    <form action="{{ route('empresa.update',$empresa->id) }}" method="POST">
        @csrf
        @method('put')
        <div class="grid grid-cols-4 gap-2 p-2 custom-grid">
            <div class="div-square">
                <input placeholder="Nombre" class="input-custom" type="text" name="nombre" id="nombre" value = {{$empresa->nombre}}>
                <label class="custom-label" for="nombre">Nombre:</label>
            </div>
            <div class="div-square">
                <input placeholder="Dirección" class="input-custom" type="text" name="direccion" id="direccion" value = {{$empresa->direccion}}>
                <label class="custom-label" for="direccion">Direccion:</label>
            </div>
            <div class="div-square">
                <input placeholder="Teléfono" class="input-custom" type="text" name="telefono" id="telefono" value = {{$empresa->telefono}}>
                <label class="custom-label" for="telefono">Teléfono</label>
            </div>
            <div class="div-square">
                <input placeholder="Email" class="input-custom" type="text" name="email" id="email" value = {{$empresa->email}}>
                <label class="custom-label" for="email">E-mail:</label>
            </div>
        </div>
        <div class="grid grid-cols-4 gap-2 p-2 custom-grid">
            <div class="div-square">
                <select  placeholder="Industria" class="input-custom" name="industria_id" id="industria_id">
                    @foreach ($industrias as $id=> $nombre)
                    <option {{$empresa->industria_id == $id ? 'selected':''}} value="{{$id}}">{{$nombre}}</option>
                    @endforeach
                </select>
                <label class="custom-label" for="industria_id">Industria:</label>
            </div>
            <div class="div-square">
                <input  placeholder="Fundación" class="input-custom" type="date" name="fundacion" id="fundacion" value = {{$empresa->fundacion}}>
                <label class="custom-label" for="fundacion">Fundación</label>
            </div>
            <div class="div-square">
                <input placeholder="Ingresos" class="input-custom" type="text" name="ingreso" id="ingreso" value = {{$empresa->ingresos}}>
                <label class="custom-label" for="ingresos">Ingreso</label>
            </div>
            <div class="div-square">
                <input placeholder="Sitio Web" class="input-custom" type="text" name="sitio_web" id="sitio_web" value = {{$empresa->sitio_web}}>
                <label class="custom-label" for="sitio_web">Site Web</label>
            </div>
        </div>
        <div class="grid grid-cols-4 gap-2 p-2 custom-grid">
            <div class="div-square">
                <input placeholder="Descripción" class="input-custom" type="text" name="descripcion" id="descripcion" value = {{$empresa->descripcion}}>
                <label class="custom-label" for="descripcion">Descripción:</label>
            </div>
            <div class="div-square">
                <input placeholder="Time start" class="input-custom" type="time" name="time_start" id="time_start" value = {{$empresa->time_start}}>
                <label class="custom-label" for="timestart">Time Start:</label>
            </div>
            <div class="div-square">
                <input placeholder="Time Off" class="input-custom" type="time" name="time_off" id="time_off" value = {{$empresa->time_off}}>
                <label class="custom-label" for="timeoff">Time Off:</label>
            </div>
            <div class="div-square">
                <button type="submit" class= "btn-link">Guardar</button>
            </div>
        </div>
    </form>
    @include('fragment._errors-form')
</div>

    @endsection
