@extends('layout')

@section('content')
<div class="custom-container h-12">
    <h3>Nuevo Estado</h3>
</div>
<div class="custom-container">
    <form action="{{ route('estado.store') }}" method="POST">
        @csrf
        <div class="grid grid-cols-5  gap-2 custom-grid">
            <div class="div-square col-start-2">
                <label class="custom-label" for="tipo_recurso_id">Tipo de Recurso</label>
                <select class="input-custom" placeholder="Tipo de recurso"  name="tipo_recurso_id" id="tipo_recurso_id" onchange="CambiarTipo(this)" title="Seleccionar">
                    @foreach ($tiporecursos as $id=> $nombre)
                    <option {{old("tipo_recurso_id", " ") == $id ? "selected" : "" }} value="{{$id}}">{{$nombre}}</option>
                    @endforeach
                </select>
            </div>
            <div class="div-square">
                <label class="custom-label" for="nombre">Nombre:</label>
                <input  class="input-custom" placeholder="Estado" type="text" name="nombre" id="nombre" value= "{{old("nombre", '')}}">
            </div>
            <div class="div-square">
                <button class="btn-primary" type="submit">Guardar</button>
            </div>
        </div>
        <div class="grid grid-cols-5  gap-2 custom-grid"  >
            <div class="col-start-3 hidden" id ="divEstados">
                <b>Estados existentes:</b>
               <ul id="ulEstados">
                </ul>
            </div>
        </div>
    </form>
    @include('fragment._errors-form')
</div>
@endsection

<script>
    function CambiarTipo(tipoRecursoSelect){
        let tipoRecursoId= tipoRecursoSelect.value;
        let nombre =document.getElementById('nombre');
        nombre.value= "";
        fetch(`http://127.0.0.1:8000/tiporecursos/${tipoRecursoId}/estados`)
        .then(function (response) {
            return response.json();
        })
        .then (function(jsonData){
            buildDivEstado(jsonData);
        })
    }
    function buildDivEstado(jsonEstados){

        let ulEstados=document.getElementById('ulEstados');
        document.getElementById("divEstados").classList.remove("hidden");
        ulEstados.innerHTML = '';
        jsonEstados.forEach(function(estado) {
            let liTag = document.createElement('li');
            liTag.innerHTML = estado.nombre;
            ulEstados.appendChild(liTag);
        });
    }

 </script>
