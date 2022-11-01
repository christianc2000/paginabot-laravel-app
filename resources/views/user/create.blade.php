@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Crear Usuario</h1>
@stop

@section('content')
    <div id="Prentrante" class="list-group col">
        <form action="{{route('user.store')}}" method="post">
        @csrf
        <div class="row  form-group">
            <x-adminlte-input name="nombre" label="nombre" placeholder="nombre" disable-feedback id="nombre" type="text"/>
            <x-adminlte-input name="correo" label="correo" placeholder="correo" disable-feedback id="correo" type="email"/>
            <x-adminlte-input name="password" label="password" placeholder="password" disable-feedback id="password" type="password"/>
            <x-adminlte-input name="celular" label="celular" placeholder="celular" disable-feedback id="celular" type="text"/>
            <x-adminlte-input name="direccion" label="direccion" placeholder="direccion" disable-feedback id="direccion" type="text"/>
        </div>
        <button class="btn btn-success" type="submit">Guardad</button>
    </form>
        
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
@stop

@section('js')
    <!-- jsDelivr :: Sortable :: Latest (https://www.jsdelivr.com/package/npm/sortablejs) -->
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>

@stop
