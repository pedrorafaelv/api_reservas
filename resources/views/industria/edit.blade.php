@extends('layout')
@section('content')
<h3>Actualizar Industria</h3>
   <form action="{{ route('industria.update',$industria->id) }}" method="POST">
        @csrf
        @method('put')
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" value = {{$industria->nombre}}>
        <button type="submit">Guardar</button>
    </form>
    @include('fragment._errors-form')
@endsection
