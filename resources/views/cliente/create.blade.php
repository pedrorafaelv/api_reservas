@extends('layout')

@section('content')
<div class="custom-container">
    <h1>Nuevo Cliente</h1>
</div>
<div class="custom-container">
    <form action="{{ route('cliente.store') }}" method="POST">
        @csrf
        <div class="grid grid-cols-4 custom-grid">
            <div class="div-square">
                <label class="custom-label"  for="nombre">Nombre:</label>
                <input class="input-custom" placeholder="Nombre" type="text" name="nombre" id="nombre" value= "{{old("nombre", 'Sin Nombre')}}">
            </div>
            <div class="div-square">
                <label class="custom-label"  for="telefono">Teléfono</label>
                <input class="input-custom" placeholder="Teléfono" type="text" name="telefono" id="telefono" value= "{{old("telefono", 'Sin Teléfono')}}">
            </div>
            <div class="div-square">
                <label class="custom-label"  for="email">E-mail:</label>
                <input class="input-custom" placeholder="Email" type="text" name="email" id="email" value= "{{old("email", 'Sin Email')}}">
            </div>
            <div>
                <button type="submit" class= "btn-primary">Guardar</button>
            </div>
        </div>
    </form>
    @include('fragment._errors-form')
</div>
@endsection
