@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="row">
        <!--**************************ESTADO 1****************************************-->
        <div id="Prentrante" class="list-group col">
            <div class="list-group-item" style="background: #256D85; color:#fff">Prospecto Entrante</div>
            <!--**********************************ITEM 1*************************************************-->
            @foreach ($users as $user)
                <div class="list-group-item item" data-id="{{$user->id}}">
                    <div class="row g-0">
                        <div class="col-md-12" style="display: inline-block;margin: 0px">
                            <p class="text-muted" style="float: left;margin: 0px"><label for="">Facebook
                                    Id </label> {{ $user->facebookid }}</p>
                        </div>
                        <div class="col-md-5">
                            <div class="row">
                                <div class="col-12">
                                    <div class="notify" id="notify1">
                                        <img src="{{ asset($user->foto) }}" class="img-fluid rounded-start" alt="...">
                                    </div>
                                </div>
                                <p class="col-12 text-muted" style="font-size: 0.45rem; margin:5px"><label
                                        for="">Últ.vez </label> {{ $user->visitas->last()->fecha }}</p>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="row g-0">
                                <label for="" class="col-md-12 texto-presentacion">Nombre</label>
                                <p class="col-md-12 texto-presentacion">{{ $user->name }}</p>
                                <label for="" class="col-md-12 texto-presentacion">Email</label>
                                <p class="col-md-12 texto-presentacion" style="word-wrap: break-word;">{{ $user->email }}
                                </p>
                                <label for="" class="col-md-12 texto-presentacion">Celular</label>
                                <p class="col-md-12 texto-presentacion">{{ $user->celular }}</p>
                            </div>
                        </div>
                        <div class="col-sm-12" style="display: none">
                            <button class="btn btn-primary button"
                                style="font-size: 10px; width: 100%; background: #8FE3CF; border: #8FE3CF" id=1>
                                <i class="fa fa-solid fa-comments"></i>
                                Comunicación
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
        <!--**************************ESTADO 2****************************************-->
        <div id="Prinicial" class="list-group col">
            <div class="list-group-item" style="background: #256D85; color:#fff">
                Prospecto Inicial
            </div>
            <div class="list-group-item item">
                Item1
            </div>
            <div class="list-group-item item">
                Item2
            </div>
        </div>
        <!--**************************ESTADO 3****************************************-->
        <div id="Clactivo" class="list-group col">
            <div class="list-group-item" style="background: #256D85; color:#fff">
                Cliente Activo
            </div>

            <div class="list-group-item item">Item2</div>
            <div class="list-group-item item">Item3</div>
        </div>
        <!--**************************ESTADO 4****************************************-->
        <div id="Clhabitual" class="list-group col">
            <div class="list-group-item" style="background: #256D85; color:#fff">
                Cliente Habitual
            </div>
            <div class="list-group-item item">
                Item1
            </div>
            <div class="list-group-item item">Item2</div>
            <div class="list-group-item item">Item3</div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <style>
        /*Notificacion*/
        .notify::before {
            position: absolute;
            content: attr(data-count);
            top: -1px;
            right: 15px;
            font-size: 10px;
            font-weight: bold;
            color: #fff;
            padding: 3px 5px;
            background: linear-gradient(#ff1a1a, #ff0000, #e60000);
            border-radius: 50px;
            line-height: 100%;
            box-shadow: 0 0 10px rgba(0, 0, 0, .2);
            transition: opacity 0.1s ease-out;
        }

        .notify.add-numb::before {
            opacity: 5;
        }

        /***********************/
        .texto-presentacion {
            font-size: 0.6rem;
            display: inline-block;
            margin: 0px
        }

        .img-fluid {
            object-fit: cover;
            float: right;
            margin: 5px;
            width: 100%;
            height: 85px;
        }

        .list-group {
            display: flex;
            flex-direction: column;
            padding-left: 0;
            margin-bottom: 0;
        }

        .list-group-item:first-child {
            border-top-left-radius: 0.25rem;
            border-top-right-radius: 0.25rem;
        }

        .list-group-item {
            position: relative;
            display: block;
            padding: 0.75rem 1.25rem;
            margin-bottom: 1px;
            /*-1px;*/
            background-color: #fff;
            border: 1px solid rgba(0, 0, 0, .125);
        }
    </style>
@stop

@section('js')
    <!-- jsDelivr :: Sortable :: Latest (https://www.jsdelivr.com/package/npm/sortablejs) -->
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>

    <script>
        console.log('Hi!');
        new Sortable(Prentrante, {
            group: 'shared', // set both lists to same group
            draggable: ".item",
            animation: 150,
            store: {
                set: function(sortable){
                    const sorts = sortable.toArray();
                    axios.post("{{route('api.prospecto.store')}}",{
                          sorts: sorts
                    }).catch(function(error){
                        console.log('tiene error');
                    });
                }
            }
        });

        new Sortable(Prinicial, {
            group: 'shared',
            draggable: ".item",
            animation: 150
        });

        new Sortable(Clactivo, {
            group: 'shared', // set both lists to same group
            draggable: ".item",
            animation: 150
        });

        new Sortable(Clhabitual, {
            group: 'shared',
            draggable: ".item",
            animation: 150
        });

    </script>
    <script>
        $(document).ready(function() {

            $('.button').on('click', function() {
                id = $(this).attr('id');
                notify = $('#notify' + id);
                add = Number(notify.attr('data-count') || 0);
                notify.attr('data-count', parseInt(add) + 1);
                if (add === 0) {
                    notify.addClass('add-numb');
                }
                false;
            });
            

        });
    </script>
@stop
