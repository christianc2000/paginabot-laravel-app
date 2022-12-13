@extends('adminlte::page')

@section('title', 'Notificaciones')

@section('content_header')

@stop

@section('content')
    @php
        $i = 1;
    @endphp
    {{--
            @forelse ($notificaciones as $notification)
                <div class="alert alert-warning" id="{{ $notification['notify']['_id'] }}">
                    <strong>Nombre: {{ $notification['notify']['promocion']['nombre'] }}</strong>
                    <strong>Descuento: </strong> <p>{{ $notification['notify']['promocion']['descripcion'] }}</p>
                    <strong>Sillas: </strong> <p>{{ $notification['notify']['promocion']['cantidadSillas'] }}</p>
                    <strong>Mesas: </strong> <p>{{ $notification['notify']['promocion']['cantidadMesas'] }}</p>
                    <strong>Fecha: </strong> <p>{{ $notification['notify']['promocion']['fecha'] }}</p>
                {{--    <p>{{ $notification['notify']['promocion']['fecha']->diffForHumans() }}</p> --}}
    {{-- <button class="mark-as-read btn btn-sm btn-dark" data-id="{{ $notification->data['contenido'] }}">Marcar como
                    leído</button> 
                </div>
                

            @empty
                <p id="notification-empty"> No hay notificaciones</p>
            @endforelse
        --}}

    <div class="box shadow-sm rounded bg-white mb-3">
        <div class="box-title border-bottom p-3">
            <h6 class="m-0">Notificaciones</h6>
        </div>
        <div class="box-body p-0">
            @forelse ($notificaciones as $notification)
                <div class="p-3 d-flex align-items-center border-bottom osahan-post-header">
                    <div
                        class="dropdown-list-image mr-3 d-flex align-items-center bg-danger justify-content-center rounded-circle text-white">
                        PAG</div>
                    <div class="font-weight-bold mr-3">
                        <div class="text-truncate">{{ $notification['notify']['promocion']['nombre'] }}</div>
                        <div class="small">
                            {{ $notification['notify']['promocion']['descripcion'] }}
                            {{ $notification['notify']['promocion']['cantidadSillas'] }}
                            {{ $notification['notify']['promocion']['cantidadMesas'] }}
                        </div>
                    </div>
                    <span class="ml-auto mb-auto">
                        <div class="btn-group">
                            <button type="button" class="btn btn-light btn-sm rounded" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="mdi mdi-dots-vertical"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" style="">
                                <button class="dropdown-item" type="button"><i class="mdi mdi-delete"></i> Delete</button>
                                <button class="dropdown-item" type="button"><i class="mdi mdi-close"></i> Turn Off</button>
                            </div>
                        </div>
                        <br />
                        <div class="text-right text-muted pt-1 tiempo" id={{ $notification['notify']['promocion']['fecha'] }}></div>
                    </span>
                </div>
            @empty
                <p id="notification-empty"> No hay notificaciones</p>
            @endforelse
        </div>
    </div>



@stop

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.0/mdb.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.css"
        integrity="sha512-DIW4FkYTOxjCqRt7oS9BFO+nVOwDL4bzukDyDtMO7crjUZhwpyrWBFroq+IqRe6VnJkTpRAS6nhDvf0w+wHmxg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.css"
        integrity="sha256-NAxhqDvtY0l4xn+YVa6WjAcmd94NNfttjNsDmNatFVc=" crossorigin="anonymous" />
    <style>
        body {
            margin-top: 20px;
            background-color: #f0f2f5;
        }

        .dropdown-list-image {
            position: relative;
            height: 2.5rem;
            width: 2.5rem;
        }

        .dropdown-list-image img {
            height: 2.5rem;
            width: 2.5rem;
        }

        .btn-light {
            color: #2cdd9b;
            background-color: #e5f7f0;
            border-color: #d8f7eb;
        }
    </style>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment-with-locales.min.js"></script>
    <script>
        console.log('hi');
       
    </script>
@stop
