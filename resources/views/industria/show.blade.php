@extends('layout')
@section('content')
 <div class="custom-container">
     <h3>Detalle de la industria: {{$industrium->nombre}}</h3>
 </div>
 <div class="custom-container">
    <div class=" grid grid-cols-2 custom-grid">
        <div>Id</div>
        <div>Nombre</div>
    </div>
    <div class=" grid grid-cols-2 custom-grid">
        <div>{{$industrium->id}}</div>
        <div>{{$industrium->nombre}}</div>
    </div>
</div>
@endsection
