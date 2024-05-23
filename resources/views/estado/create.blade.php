@extends('layout')

@section('content')
<div class="custom-container">
    <h3>Nuevo Estado</h3>
</div>
<div class="custom-container">
    <form action="{{ route('estado.store') }}" method="POST">
        @csrf
        <div class="grid grid-cols-5  gap-2 custom-grid">
            <div class="div-square col-start-2">
                <label class="custom-label" for="tipo_recurso_id">Entidad</label>
                <select class="input-custom" placeholder="Entidad"  name="tipo_recurso_id" id="tipo_recurso_id">
                    @foreach ($tiporecursos as $id=> $nombre)
                    <option {{old("tipo_recurso_id", " ") == $id ? "selected" : "" }} value="{{$id}}">{{$nombre}}</option>
                    @endforeach
                </select>
            </div>
            <div class="div-square">
                <label class="custom-label" for="nombre">Nombre:</label>
                <input  class="input-custom" placeholder="Nombre" type="text" name="nombre" id="nombre" value= "{{old("nombre", 'Sin nombre')}}">
            </div>
            <div class="div-square">
                <button class="btn-primary" type="submit">Guardar</button>
            </div>
        </div>
    </form>
    @include('fragment._errors-form')
</div>
@endsection
