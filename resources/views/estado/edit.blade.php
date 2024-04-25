@extends('layout')

@section('content')
    <h1>Actualizar Estado</h1>
    <form action="{{ route('estado.update', $estado->id) }}" method="POST">
        @csrf
        @method('put')
        <label for="entidad_id">Entidad</label>
        <select name="entidad_id" id="entidad_id">
            @foreach ($entidads as $id=> $nombre)
            <option {{$estado->entidad_id == $id ? 'selected':''}} value="{{$id}}">{{$nombre}}</option>
            @endforeach
        </select>
        {{--  <input type="text" name="entidad_id" id="entidad_id" value = {{$estado->entidad->nombre}}>  --}}
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" value = {{$estado->nombre}}>
        <button type="submit">Guardar</button>
    </form>
    @include('fragment._errors-form')
@endsection
