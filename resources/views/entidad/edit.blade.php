@extends('layout')
@section('content')
<div class="custom-container">
    <h3>Editar Entidad : {{$entidad->nombre}}</h3>
</div>
<div class="custom-container">
    <form action="{{ route('entidad.update', $entidad->id) }}" method="POST">
        @csrf
        @method('put')
        <div class="grid grid-cols-4 gap-2 custom-grid">
            <div class="div-square col-span-2 col-start-2">
                <input placeholder="Nombre"  class="input-custom" type="text" name="nombre" id="nombre" value= "{{old("nombre", $entidad->nombre)}}">
                <label class="custom-label" for="nombre"> Nombre:</label>
            </div>
            <div class="div-square">
                <button type="submit" class="btn-primary">Guardar</button>
            </div>
        </div>
    </form>
    @include('fragment._errors-form')
</div>
@endsection
