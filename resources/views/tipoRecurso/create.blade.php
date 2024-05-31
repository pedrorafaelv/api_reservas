@extends('layout')
@section('content')
<div class="custom-container">
    <h3>Tipo de Recurso</h3>
</div>
<div class="custom-container">
    <form action="{{ route('tiporecurso.store') }}" method="POST">
        @csrf
        <div class="grid grid-cols-4 custom-grid gap-2" >
            <div class="div-square col-start-2">
                <input class="input-custom" placeholder="Nombre" type="text" name="nombre" id="nombre">
                <label class="custom-label" for="nombre">Nombre:</label>
            </div>
            <div class="div-square">
                <button class="btn-link" type="submit">Guardar</button>
            </div>
        </div>
    </form>
    @include('fragment._errors-form')
</div>
@endsection
