@extends('layout')

@section('content')
    <h1>Listado de Clientes</h1>
    @foreach ($clientes as $cliente)
    <p>{{ $cliente->nombre }}</p>
    @endforeach


@endsection
