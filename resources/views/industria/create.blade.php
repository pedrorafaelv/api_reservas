@extends('layout')

@section('content')
<div class="custom-container">
    <h3>Nueva Industria</h3>
</div>
<div class="custom-container">
    <form action="{{ route('industria.store') }}" method="POST">
        @csrf
        <div class="grid grid-cols-4 custom-grid gap-2">
            <div class="div-square col-start-2">
                <label class="custom-label" for="nombre">Nombre:</label>
                <input class="input-custom" placeholder="Nombre" type="text" name="nombre" id="nombre" value= "{{old("nombre", '')}}">
            </div>
            <div class="div-square">
                <button class="btn-link" type="submit">Guardar</button>
            </div>
        </div>
    </form>
    @include('fragment._errors-form')
</div>
@endsection
