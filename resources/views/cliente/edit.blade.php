@extends('layout')

@section('content')
<div class="custom-container p-1">
    <h3>Actualizar Cliente: {{$cliente->nombre}}</h3>
</div>
 <div class="custom-container">
     <form action="{{ route('cliente.update', $cliente->id) }}" method="POST">
         @csrf
         @method('put')
         <div class="grid grid-cols-4 gap-2 custom-grid">
            <div class="div-square">
                <input placeholder="Nombre" type="text" name="nombre" id="nombre" value = "{{$cliente->nombre}}" class="input-custom"  placeholder="Nombre" />
                <label class="custom-label"> Nombre: </label>
            </div>
            <div class="div-square">
                <input type="text" name="telefono" id="telefono" value = "{{$cliente->telefono}}" class="input-custom"  placeholder="Teléfono" />
                <label for="telefono" class="custom-label"> Teléfono</label>
            </div>
            <div class="div-square">
                <input type="text" name="email" id="email" value ="{{$cliente->email}}" class="input-custom" placeholder="email"/>
                <label for="email" class="custom-label">E-mail:</label>
            </div>
            <div class="div-square">
                <button type="submit" class="btn-primary">Guardar</button>
            </div>
        </div>
    </form>
</div>
    @include('fragment._errors-form')
@endsection

