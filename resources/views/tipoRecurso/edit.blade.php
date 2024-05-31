@extends('layout')
@section('content')
<div class="custom-container h-16">
    <h3>Editar Tipo de Recurso{{$tiporecurso->nombre}}</h3>
</div>
<div class="custom-container">
    <form action="{{ route('tiporecurso.update', $tiporecurso->id) }}" method="POST">
        @csrf
        @method('put')
        <div class="grid grid-cols-4 gap-2 custom-grid">
            <div class="div-square col-start-2">
                <input class="input-custom"  placeholder= "Nombre" type="text" name="nombre" id="nombre">
                <label class="custom-label" for="nombre">Nombre:</label>
            </div>
            <div class="div-square">
                <button type="submit" class="btn-link">Guardar</button>
            </div>
        </div>
    </form>
    @include('fragment._errors-form')
</div>
@endsection
