@extends('layout')

@section('content')
<div class="custom-container">
    <h3>Actualizar Estado: {{$estado->nombre}}</h3>
</div>
<div class="custom-container">
    <form action="{{ route('estado.update', $estado->id) }}" method="POST">
        @csrf
        @method('put')
        <div class="grid grid-cols-4 gap-2 custom-grid">
            <div class="div-square col-start-2">
                <select placeholder="Tipo de Recurso" class="input-custom" name="tipo_recurso_id" id="tipo_recurso_id">
                    @foreach ($tiporecursos as $id=> $nombre)
                    <option {{$estado->tipo_recurso_id == $id ? 'selected':''}} value="{{$id}}">{{$nombre}}</option>
                    @endforeach
                </select>
                <label class="custom-label" for="tipo_recurso_id">Entidad</label>
            </div>
            <div class="div-square">
                <input placeholder="" class="input-custom" type="text" name="nombre" id="nombre" value = {{$estado->nombre}}>
                <label class="custom-label" for="nombre">Nombre:</label>
            </div>
             <div class="div-square">
                 <button  class= "btn-primary" type="submit">Guardar</button>
             </div>
        </div>
    </form>
    @include('fragment._errors-form')
</div>
@endsection
