@extends('adminlte::page')

@section('title', 'Notificaciones')

@section('content_header')

@stop

@section('content')
    @php
        $i = 1;
    @endphp
    <div class="card-body" id="notificaciones-view">

            @forelse ($notificaciones as $notification)
                <div class="alert alert-warning" id="{{ $notification['notify']['_id'] }}">
                    <strong>Nombre: </strong><p>{{ $notification['notify']['promocion']['nombre'] }}</p>
                    <strong>Descuento: </strong> <p>{{ $notification['notify']['promocion']['descripcion'] }}</p>
                    <strong>Sillas: </strong> <p>{{ $notification['notify']['promocion']['cantidadSillas'] }}</p>
                    <strong>Mesas: </strong> <p>{{ $notification['notify']['promocion']['cantidadMesas'] }}</p>
                    <strong>Descripción: </strong> <p>{{ $notification['notify']['promocion']['fecha'] }}</p>
                {{--    <p>{{ $notification['notify']['promocion']['fecha']->diffForHumans() }}</p>--}}
                    {{-- <button class="mark-as-read btn btn-sm btn-dark" data-id="{{ $notification->data['contenido'] }}">Marcar como
                    leído</button> --}}
                </div>
                @if ($loop->last)
                    <a href="#" id="mark-all">Marcar todo como leído</a>
                @endif

            @empty
                <p id="notification-empty"> No hay notificaciones</p>
            @endforelse
        
    </div>
@stop

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.0/mdb.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.css"
    integrity="sha512-DIW4FkYTOxjCqRt7oS9BFO+nVOwDL4bzukDyDtMO7crjUZhwpyrWBFroq+IqRe6VnJkTpRAS6nhDvf0w+wHmxg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.0/mdb.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"
        integrity="sha512-Zq9o+E00xhhR/7vJ49mxFNJ0KQw1E1TMWkPTxrWcnpfEFDEXgUiwJHIKit93EW/XxE31HSI5GEOW06G6BF1AtA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"
    integrity="sha512-Zq9o+E00xhhR/7vJ49mxFNJ0KQw1E1TMWkPTxrWcnpfEFDEXgUiwJHIKit93EW/XxE31HSI5GEOW06G6BF1AtA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        console.log('hi');
    </script>
@stop
