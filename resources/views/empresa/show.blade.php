@extends('layout')
@section('content')
<div class="custom-container">
    <h3>Detalle de la empresa: {{$empresa->nombre}}</h3>
</div>
<div class="custom-container">
    <div class="grid grid-cols-6 custom-grid">
        <div class="table-header">
            <div class="header-tittle">
                Id
            </div>
        </div>
        <div class="table-header">
            <div class="header-tittle">
                Nombre
            </div>
        </div>
        <div class="table-header">
            <div class="header-tittle">
                Dirección
            </div>
        </div>
        <div class="table-header">
            <div class="header-tittle">
                Teléfono
            </div>
        </div>
        <div class="table-header">
            <div class="header-tittle">
                Email
            </div>
        </div>
        <div class="table-header">
            <div class="header-tittle">
                Industria
            </div>
        </div>
    </div>
    <div class="grid grid-cols-6 custom-grid">
        <div>{{$empresa->id}}</div>
        <div>{{$empresa->nombre}}</div>
        <div>{{$empresa->direccion}}</div>
        <div>{{$empresa->telefono}}</div>
        <div>{{$empresa->email}}</div>
        <div>{{$empresa->industria->nombre}}</div>
    </div>
    <div class=" grid grid-cols-6 custom-grid">
        <div class="table-header">
            <div class="header-tittle">
                Fundación
            </div>
        </div>
        <div class="table-header">
            <div class="header-tittle">
                Ingresos
            </div>
        </div>
        <div class="table-header">
            <div class="header-tittle">
                Sitio
                Web
            </div>
        </div>
        <div class="table-header">
            <div class="header-tittle">
                descripción
            </div>
        </div>
        <div class="table-header">
            <div class="header-tittle">
                Hora de inico
            </div>
        </div>
        <div class="table-header">
            <div class="header-tittle">
                Hora fin
            </div>
        </div>
    </div>
    <div class="grid grid-cols-6 custom-grid">
          <div>{{$empresa->fundacion}}</div>
          <div>{{$empresa->ingresos}}</div>
          <div>{{$empresa->sitio_web}}</div>
          <div>{{$empresa->descripcion}}</div>
          <div>{{$empresa->time_start}}</div>
          <div>{{$empresa->time_off}}</div>
    </div>
</div>
@endsection
