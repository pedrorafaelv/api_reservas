@extends('layout')

@section('content')
<h3>Nueva Industria</h3>
    <form action="{{ route('industria.store') }}" method="POST">
        @csrf
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" value= "{{old("nombre", 'Sin nombre')}}">
        <button type="submit">Guardar</button>
    </form>
    @include('fragment._errors-form')
@endsection
