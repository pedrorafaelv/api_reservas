extends('layout')
@section('content')
    <h1>Editar Tipo de Recurso</h1>
    <form action="{{ route('tiporecurso.store') }}" method="POST">
        @csrf
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre">
        <button type="submit">Guardar</button>
    </form>
    @include('fragment._errors-form')
endsection
