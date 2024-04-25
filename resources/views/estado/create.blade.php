@extends('layout')

@section('content')
    <h1>Nuevo Estado</h1>
    <form action="{{ route('estado.store') }}" method="POST">
        @csrf
        <label for="entidad_id">Entidad</label>
        <select name="entidad_id" id="entidad_id">
            @foreach ($entidads as $id=> $nombre)
            <option {{old("entidad_id", " ") == $id ? "selected" : "" }} value="{{$id}}">{{$nombre}}</option>
            @endforeach
        </select>
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" value= "{{old("nombre", 'Sin nombre')}}">
        {{--  <input type="text" name="entidad_id" id="entidad_id" value= "{{old("entidad_id", 'Sin entidad')}}">  --}}
        <button type="submit">Guardar</button>
    </form>
    @include('fragment._errors-form')
@endsection
