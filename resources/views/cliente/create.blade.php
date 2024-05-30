@extends('layout')

@section('content')
<div class="custom-container">
    <h1>Nuevo Cliente</h1>
</div>
<div class="custom-container">
    <form action="{{ route('cliente.store') }}" method="POST">
        @csrf
        <div class="grid grid-cols-4 custom-grid gap-2">
            <div class="div-square">
                <label class="custom-label"  for="nombre">Nombre:</label>
                <input class="input-custom" placeholder="Nombre" type="text" name="nombre" id="nombre" value= "{{old("nombre",'' )}}">
            </div>
            <div class="div-square">
                <label class="custom-label"  for="telefono">Teléfono</label>
                <input class="input-custom" placeholder="Teléfono" type="text" name="telefono" id="telefono" value= "{{old("telefono",'' )}}">
            </div>
            <div class="div-square">
                <label class="custom-label"  for="email">E-mail:</label>
                <input class="input-custom" placeholder="Email" type="text" name="email" id="email" value= "{{old("email", '')}}">
            </div>
            <div>
                <button type="submit" class= "btn-primary">Guardar</button>
            </div>
        </div>
    </form>
    @include('fragment._errors-form')
</div>
@endsection
