@extends('layout')

@section('content')
    <form action="{{ route('industria.store') }}" method="POST">
        @csrf
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre">
        <button type="submit">Guardar</button>
    </form>
    @include('fragment._errors-form')
@endsection
