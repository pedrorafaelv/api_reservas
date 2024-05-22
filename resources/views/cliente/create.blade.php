@extends('layout')

@section('content')
<div class="container p-1">

    <h1>Nuevo Cliente</h1>
</div>
<div class="container p1">
    <form action="{{ route('cliente.store') }}" method="POST">
        @csrf
        <div class="grid grid-cols-4">
            <div>
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre" value= "{{old("nombre", 'Sin Nombre')}}">
            </div>
            <div>
                <label for="telefono">Teléfono</label>
                <input type="text" name="telefono" id="telefono" value= "{{old("telefono", 'Sin Nombre')}}">
            </div>
            <div>
                <label for="email">E-mail:</label>
                <input type="text" name="email" id="email" value= "{{old("email", 'Sin Nombre')}}">
            </div>
            <div>
                <button type="submit" class= "btn-primary">Guardar</button>
            </div>
        </div>
    </form>
    @include('fragment._errors-form')
</div>
    @endsection
