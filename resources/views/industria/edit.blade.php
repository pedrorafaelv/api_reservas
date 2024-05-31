@extends('layout')
@section('content')
<div class="custom-container">
    <h3>Actualizar Industria: {{$industria->nombre}}</h3>
</div>
<div class="custom-container">
    <form action="{{ route('industria.update',['industrium'=>$industria->id]) }}" method="POST">
        @csrf
        @method('put')
        <div class="grid grid-cols-4 gap-2 custom-grid">
            <div class="div-square col-start-2">
                <input placeholder ="Nombre" class="input-custom" type="text" name="nombre" id="nombre" value = {{$industria->nombre}}>
                <label class = "custom-label" for="nombre">Nombre:</label>
                </div>
            <div class="div-square">
                <button class="btn-link" type="submit">Guardar</button>
            </div>
        </div>
    </form>
    @include('fragment._errors-form')
</div>
@endsection
