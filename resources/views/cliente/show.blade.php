@extends('layout')
@section('content')
<div class="custom-container">
    <h3>Detalle del cliente: {{$cliente->nombre}}</h3>
</div>
<div class="custom-container">
    <div class="grid grid-cols-4 custom-grid">
        <div>Id</div>
        <div>Nombre</div>
        <div>Teléfono</div>
        <div>@Email</div>
    </div>
    <div class="grid grid-cols-4 custom-grid">
            <div>{{$cliente->id}}</div>
            <div>{{$cliente->nombre}}</div>
            <div>{{$cliente->telefono}}</div>
            <div>{{$cliente->email}}</div>
    </div>
    @include('fragment._errors-form')

</div>
@endsection

