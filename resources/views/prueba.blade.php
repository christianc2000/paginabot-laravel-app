@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div id="Prentrante" class="list-group col">
        <div class="list-group-item" style="background: #256D85; color:#fff">Prospecto Entrante</div>
        <div>
            @foreach ($prI as $p)
                {{ $p['prospecto']['_id'] }}
            @endforeach

        </div>
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
