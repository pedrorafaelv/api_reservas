@extends('layout')

@section('content')
<div class="custom-container">
    <h3>Actualizar Reserva: {{$reserva->id}}</h3>
</div>
<div class="custom-container">
    <form action="{{ route('reserva.update', $reserva) }}" method="POST">
        @csrf
        @method('put')
        <div class="grid grid-cols-4 gap-2 custom-grid">
            <div class="div-square">
                <select class="input-custom" placeholder="Empresa" name="empresa_id" id="empresa_id">
                    @foreach ($empresas as $id=> $nombre)
                    <option {{$reserva->empresa_id == $id ? "selected" : "" }} value="{{$id}}">{{$nombre}}</option>
                    @endforeach
                </select>
                <label class="custom-label" for="empresa_id">Empresa</label>
            </div>
            <div class="div-square">
                <input class="input-custom" placeholder="Fecha Inicio" type="datetime-local" name="fecha_inicio" id="fecha_inicio" value= "{{old ('fecha_inicio', date('Y-m-d\TH:i', strtotime($reserva->fecha_inicio)))}}">
                <label class="custom-label" for="fecha_inicio">Fecha de inicio</label>
            </div>
            <div class="div-square">
                <input class="input-custom" placeholder="Fecha Fin" type="datetime-local" name="fecha_fin" id="fecha_fin" value ="{{old('fecha_fin', date('Y-m-d\TH:i', strtotime($reserva->fecha_fin)))}}">
                <label class="custom-label" for="fecha_fin">Fecha fin</label>
            </div>
            <div class="div-square">
                <select class="input-custom" placeholder=" Cliente" name="cliente_id" id="cliente_id">
                    @foreach ($clientes as $id=> $nombre)
                    <option {{old("cliente_id", "$reserva->cliente_id") == $id ? "selected" : "" }} value="{{$id}}">{{$nombre}}</option>
                    @endforeach
                </select>
                <label class="custom-label" for="cliente_id">Cliente</label>
            </div>
        </div>
        <div class="grid grid-cols-4 gap-2 custom-grid">
            <div class="div-square">
                <select class="input-custom" placeholder="Rceurso" name="recurso_id" id="recurso_id">
                    @foreach ($recursos as $id=> $nombre)
                    <option {{old("recurso_id", "$reserva->recurso_id") == $id ? "selected" : "" }} value="{{$id}}">{{$nombre}}</option>
                    @endforeach
                </select>
                <label class="custom-label" for="recurso_id">Recurso</label>
            </div>
            <div class="div-square">
                <select class="input-custom" placeholder="Estado" name="estado_id" id="estado_id">
                    @foreach ($estados as $id=> $nombre)
                    <option {{old("estado_id", " $reserva->estado_id") == $id ? "selected" : "" }} value="{{$id}}">{{$nombre}}</option>
                    @endforeach
                </select>
                <label class="custom-label" for="estado_id">Estado</label>
            </div>
          <div class="div-square">
              <button class="btn-primary" type="submit">Guardar</button>
          </div>
        </div>
    </form>
    @include('fragment._errors-form')
</div>
@endsection
