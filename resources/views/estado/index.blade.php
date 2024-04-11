@extends('layout')

@section('content')
@foreach ($empresas as $empresa)
    <p>{{ $empresa->nombre }}</p>
@endforeach
@endsection
