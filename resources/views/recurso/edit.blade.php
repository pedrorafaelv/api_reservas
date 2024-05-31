@extends('layout')
@section('content')
<div class="custom-container">
    <h3>Actualizar Recurso: {{$recurso->nombre}}</h3>
</div>
<div class="custom-container">
    <form action="{{ route('recurso.update',  $recurso) }}" method="POST">
        @csrf
        @method('put')
        <div class="grid grid-cols-4 gap-2 custom-grid">
            <div class="div-square">
                <input class="input-custom" placeholder="Nombre" type="text" name="nombre" id="nombre" value ="{{$recurso->nombre}}">
                <label class="custom-label" for="nombre">Nombre:</label>
            </div>
            <div class="div-square">
                <select class="input-custom" placeholder="Empresa" name="empresa_id" id="empresa_id">
                    @foreach ($empresas as $id=> $nombre)
                    <option {{$recurso->empresa_id == $id ? 'selected':''}} value="{{$id}}">{{$nombre}}</option>
                    @endforeach
                </select>
                <label class="custom-label" for="empresa_id" >Empresa</label>
            </div>
            <div class="div-square">
                <select  class="input-custom" placeholder="tipo Recurso" name="tipo_recurso_id" id="tipo_recurso_id">
                    @foreach ($tiporecursos as $id=> $nombre)
                    <option {{$recurso->tipo_recurso_id == $id ? 'selected':''}} value="{{$id}}">{{$nombre}}</option>
                    @endforeach
                </select>
                <label class="custom-label" for="tipo_recurso_id">Tipo de recurso</label>
            </div>
        </div>
        <div class="grid grid-cols-4 gap-2 custom-grid">
            <div class="div-square">
                <select class="input-custom" placeholder="Estado" name="estado_id" id="estado_id">
                    @foreach ($estados as $id=> $nombre)
                    <option {{$recurso->estado_id == $id ? 'selected':''}} value="{{$id}}">{{$nombre}}</option>
                    @endforeach
                </select>
                <label class="custom-label" for="estado_id">Estado</label>
            </div>
            <div class="div-square">
                <label class="custom-label" for="time_format_reserve">Tiempo de Reserva</label>
                <input type="text" class="input-custom" placeholder="Formato de Tiempo" name="time_format_reserve" id="time_format_reserve" value ="{{$recurso->time_format_reserve}}">
            </div>

            <button class= "btn-link" type="submit">Guardar</button>
        </div>
    </form>
    @include('fragment._errors-form')
</div>
@endsection
