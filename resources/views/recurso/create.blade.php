@extends('layout')

@section('content')
<div class="custom-container h-12">
    <h3>Nuevo Recurso</h3>
</div>
<div class="custom-container">
    <form action="{{ route('recurso.store') }}" method="POST">
        @csrf
        <div class="grid grid-cols-5 custom-grip gap-2">
            <div class="div-square col-start-2">
                <label class="custom-label" for="nombre">Nombre:</label>
                <input  class="input-custom" placeholder="Nombre" type="text" name="nombre" id="nombre" value= "{{old("nombre", '')}}">
            </div>
            <div class="div-square">
                <label class="custom-label" for="empresa_id">Empresa</label>
                <select class="input-custom" placeholder="Empresa"  name="empresa_id" id="empresa_id" onchange="">
                    @foreach ($empresas as $id=> $nombre)
                    <option {{old("empresa_id", " ") == $id ? "selected" : "" }} value="{{$id}}">{{$nombre}}</option>
                    @endforeach
                </select>
            </div>
            <div class="div-square">
                <label class="custom-label" for="tiporecurso_id">Tipo De Recurso</label>
                <select class="input-custom" placeholder="Tipo Recurso"  name="tipo_recurso_id" id="tipo_recurso_id" onchange="CambiarTipo(this)">
                    @foreach ($tiporecursos as $id=> $nombre)
                    <option {{old("tipo_recurso_id", " ") == $id ? "selected" : "" }} value="{{$id}}">{{$nombre}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="grid grid-cols-5 custom-grid gap-2">
            <div class="div-square col-start-2">
                <label class="custom-label" for="estado_id">Estado</label>
                <select class="input-custom"  name="estado_id" id="estado_id">
                </select>
            </div>
            <div class="div-square">
                <label class="custom-label" for="time_format_reserve">Tiempo de Reserva</label>
                <input type="text"  class="input-custom" name="time_format_reserve" id="time_format_reserve" value= "{{old("time_format_reserve", '')}}">
            </div>
        </div>
        <div class="grid grid-cols-5 custom-grid">
            <div class="div-square col-start-3">
                <button class="btn-primary" type="submit">Guardar</button>
            </div>
        </div>
    </form>
    @include('fragment._errors-form')
</div>
@endsection

<script>
    function CambiarTipo(tipoRecursoSelect){
        let tipoRecursoId= tipoRecursoSelect.value;
        fetch(`http://127.0.0.1:8000/tiporecursos/${tipoRecursoId}/estados`)
        .then(function (response) {
            return response.json();
        })
        .then (function(jsonData){
            buildEstadoSelect(jsonData);
        })
    }
    function buildEstadoSelect(jsonEstados){
        let estadosSelect=document.getElementById('estado_id');
        estadosSelect.innerHTML = '';
        jsonEstados.forEach(function(estado){
            let optionTag = document.createElement('option');
            optionTag.value= estado.id;
            optionTag.innerHTML=estado.nombre;
            estadosSelect.append(optionTag);
        })
       }

       {{--  function CambiarEmpresa(empresaSelect){
        let empresaId = empresaSelect.value;
        fetch(`http://127.0.0.1:8000/empresas/${empresaId}/tipoRecursos`)
        .then(function (response) {
            return response.json();
        })
        .then (function(jsonData){
            buildTipoRecursoSelect(jsonData);
        })
    }

    function buildTipoRecursoSelect(jsonEmpresas){
        let tipoRecursoSelect=document.getElementById('tipo_recurso_id');
        if (!tipoRecursoSelect) {
            console.error('Elemento con ID "tipo_recurso_id" no encontrado.');
            return;
        }
        tipoRecursoSelect.innerHTML = '';

        jsonEmpresas.forEach(function(tipoRecurso){
            let optionTag = document.createElement('option');
            optionTag.value= tipoRecurso.id;
            optionTag.innerHTML=tipoRecurso.nombre;
            tipoRecursoSelect.append(optionTag);
        })
       }  --}}

 </script>
