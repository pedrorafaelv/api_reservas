@extends('layout')
{{--  @vite(['resources/css/app.css', 'resources/js/app.js'])  --}}
@section('content')

<div class="custom-container h-12">
    <h3>Nueva Reserva</h3>
</div>
<div class="custom-container">
    <form action="{{ route('reserva.store') }}" method="POST">
        @csrf
        <div class="grid grid-cols-5 custom-grid gap-2">
            <div class="div-square col-start-2">
                <label class="custom-label" for="empresa_id">Empresa</label>
                <select class="input-custom" placeholder="Recurso" onchange="cargarRecurso(this)" name="empresa_id" id="empresa_id">
                    @foreach ($empresas as $id=> $nombre)
                    <option {{old("empresa_id", " ") == $id ? "selected" : "" }} value="{{$id}}">{{$nombre}}</option>
                    @endforeach
                </select>
            </div>
            <div class="div-square">
                <label class="custom-label" for="fecha_inicio">Fecha de inicio</label>
                <input class="input-custom" placeholder="Fecha Inicio" type="datetime-local" name="fecha_inicio" id="fecha_inicio" value= "{{old("fecha_inicio")}}">
            </div>
            <div class="div-square">
                <label class="custom-label" for="fecha_fin">Fecha fin</label>
                <input class="input-custom" placeholder="Fecha Fin" type="datetime-local" name="fecha_fin" id="fecha_fin" value= "{{old("fecha_fin")}}">
            </div>
        </div>
        <div class="grid grid-cols-5 custom-grid gap-2">
            <div class="div-square col-start-2">
                <label class="custom-label" for="cliente_id">Cliente</label>
                <select class="input-custom" placeholder="Cliente" name="cliente_id" id="cliente_id">
                    @foreach ($clientes as $id=> $nombre)
                    <option {{old("cliente_id", " ") == $id ? "selected" : "" }} value="{{$id}}">{{$nombre}}</option>
                    @endforeach
                </select>
            </div>
            <div class="div-square">
                <label class="custom-label" for="recurso_id">Recurso</label>
                <select class="input-custom" placeholder="Recurso" onchange="cargarEstados(this)" name="recurso_id" id="recurso_id">
                    <option value="">Seleccione un recurso</option>
                </select>
            </div>
            <div class="div-square">
                <label class="custom-label" for="estado_id">Estado</label>
                <select  class="input-custom" placeholder="Estado" name="estado_id" id="estado_id">
                    @foreach ($estados as $id=> $nombre)
                    <option {{old("estado_id", " ") == $id ? "selected" : "" }} value="{{$id}}">{{$nombre}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="grid grid-cols-5 custom-grid gap-2">
            <div class="div-square col-start-3">
                <button class="btn-primary" type="submit">Guardar</button>
            </div>
        </div>
    </form>
    @include('fragment._errors-form')
</div>
@endsection

    <script>
    function cargarRecurso(empresas_select){
         let empresaId= empresas_select.value;
         fetch(`http://127.0.0.1:8000/empresas/${empresaId}/recursos`)
         .then(function (response) {
            return response.json();
         })
         .then (function(jsonData){
            buildRecursosSelect(jsonData);
         })
        }

  function buildRecursosSelect(jsonRecursos){
        let RecursosSelect=document.getElementById('recurso_id');
        jsonRecursos.forEach(function(recurso){
            let optionTag = document.createElement('option');
            optionTag.value= recurso.id;
            optionTag.innerHTML=recurso.nombre;
            RecursosSelect.append(optionTag);
    })
  }

   function cargarEstados(recursos_select){
    let recursoId=recursos_select.value;
    fetch(`http://127.0.0.1:8000/recursos/${recursoId}/estados`)
    .then(function(response){
        return response.json();
    })
    .then (function(jsonEstado){
        buildEstadoSelect(jsonEstado);
    })
   }

   function buildEstadoSelect(jsonEstados){
    let estadosSelect=documen.getElementById('estado_id');
    jsonEstados.forEach(function(estado){
        let optionTag = document.createElement('option');
        optionTag.value= estado.id;
        optionTag.innerHTML=esatdo.nombre;
        estadosSelect.append(optionTag);
    })
   }
 </script>
<script src="{{ asset('js/recursos.js')}}"></script>
