@extends('layout')

@section('content')
<div class="custom-container">
    <h3>Nuevo Recurso</h3>
</div>
<div class="custom-container">
    <form action="{{ route('recurso.store') }}" method="POST">
        @csrf
        <div class="grid grid-cols-5 custom-grip gap-2">
            <div class="div-square col-start-2">
                <label class="custom-label" for="nombre">Nombre:</label>
                <input  class="input-custom" placeholder="Nombre" type="text" name="nombre" id="nombre" value= "{{old("nombre", '')}}">
            </div>
            <div class="div-square">
                <label class="custom-label" for="empresa_id">Empresa</label>
                <select class="input-custom" placeholder="Empresa"  name="empresa_id" id="empresa_id">
                    @foreach ($empresas as $id=> $nombre)
                    <option {{old("empresa_id", " ") == $id ? "selected" : "" }} value="{{$id}}">{{$nombre}}</option>
                    @endforeach
                </select>
            </div>
            <div class="div-square">
                <label class="custom-label" for="tiporecurso_id">Tipo De Recurso</label>
                <select class="input-custom" placeholder="Tipo Recurso"  name="tipo_recurso_id" id="tipo_recurso_id">
                    @foreach ($tiporecursos as $id=> $nombre)
                    <option {{old("tipo_recurso_id", " ") == $id ? "selected" : "" }} value="{{$id}}">{{$nombre}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="grid grid-cols-5 custom-grid gap-2">
            <div class="div-square col-start-2">
                <label class="custom-label" for="estado_id">Estado</label>
                <select class="input-custom"  name="estado_id" id="estado_id">
                    @foreach ($estados as $id=> $nombre)
                    <option {{old("estado_id", " ") == $id ? "selected" : "" }} value="{{$id}}">{{$nombre}}</option>
                    @endforeach
                </select>
            </div>
            <div class="div-square">
                <label class="custom-label" for="time_format_reserve">Tiempo de Reserva</label>
                <input type="text"  class="input-custom" name="time_format_reserve" id="time_format_reserve" value= "{{old("time_format_reserve", '')}}">
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
