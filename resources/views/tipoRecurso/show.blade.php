@extends('layout')
@section('content')
<div class="custom-container">
    <h3>Detalle del Tipo de recurso: {{$tiporecurso->nombre}}</h3>
</div>
<div class="custom-container">
    <div class="grid grid-cols-4 custom-grid">
        <div class="col-start-2">Id</div>
        <div>Nombre</div>
    </div>
    <div class="grid grid-cols-4 custom-grid">
        <div class="col-start-2">{{$tiporecurso->id}}</div>
        <div>{{$tiporecurso->nombre}}</div>
    </div>
</div>
@endsection
