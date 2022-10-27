@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <!--modal-->
    <x-adminlte-modal id="modalCustom" title="COMUNICACIÓN" size="lg" theme="teal" icon="fa fa-solid fa-comments" v-centered
        static-backdrop scrollable>

        <form action="{{ route('comunicacion.store') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-7 col-lg-7 col-sm-7 border-right">
                    <div class="form-group row">
                        <x-adminlte-input name="contactar" label="Contactar" placeholder="contactar" disable-feedback
                            id="contactar" rounded />
                        <x-adminlte-select name="comunicacion_id" label="Medio" label-class="text-dark col-form-label">
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-gray">
                                    <i class="fa fa-solid fa-envelope"></i>
                                </div>
                            </x-slot>
                            <option value="1">Celular</option>
                            <option value="2">Email</i></option>
                            <!--  <button class="btn btn-success" type="submit">OK</button>-->
                        </x-adminlte-select>
                        <x-adminlte-textarea name="mensaje" label="Mensaje" rows=5 igroup-size="sm" label-class="text-dark"
                            placeholder="Escribe tu mensaje..." disable-feedback>
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fas fa-lg fa-comment-dots text-dark"></i>
                                </div>
                            </x-slot>
                            <x-slot name="appendSlot">
                                <x-adminlte-button theme="secondary" icon="fas fa-paper-plane" label="Enviar"
                                    id="btnEnviar" />
                            </x-slot>
                        </x-adminlte-textarea>

                    </div>

                </div>
                <div class="col-md-5 col-lg-5 col-sm-5">
                    <div class="border"
                        style="  display: inline-block;
                padding:5px;box-sizing: border-box;float:left;">
                        <div style="width: auto; height: 300px">
                            <img src="" alt="" id="imagenM"
                                style="object-fit: cover;
                    width:100%;
                    height:100%;">
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-success">Guardar</button>
        </form>
    </x-adminlte-modal>
    <div class="row">
        <!--**************************ESTADO 1****************************************-->
        <div id="Prentrante" class="list-group col">
            <div class="list-group-item" style="background: #256D85; color:#fff">Prospecto Entrante</div>
            @foreach ($e1 as $user)
                <div class="list-group-item item" data-id={{ $user['prospecto']['facebookId'] }}>
                    <div class="row g-0">
                        <div class="col-md-12" style="height: 25px;">
                            <p class="text-muted" style="font-size: 0.7rem"><label for="">FB </label>
                                {{ $user['prospecto']['facebookId'] }}</p>
                        </div>
                        <div class="col-md-5">
                            <div class="row">
                                <div class="col-12">
                                    <div class="notify" id={{ 'notify' . $user['prospecto']['facebookId'] }}
                                        data-count={{ $user['numeroVeces'] }}>
                                        <img src={{ asset($user['prospecto']['imagen']) }} class="img-fluid rounded-start"
                                            alt="...">
                                    </div>
                                </div>
                                <p class="col-12 text-muted" style="font-size: 0.45rem; margin:5px"><label
                                        for="">Últ.vez </label> {{ $user['ultimoIngreso'][0]['entrada'] }}</p>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="row g-0">
                                <label for="" class="col-md-12 texto-presentacion">Nombre</label>
                                <p class="col-md-12 texto-presentacion">{{ $user['prospecto']['nombre'] }}</p>
                                <label for="" class="col-md-12 texto-presentacion">Email</label>
                                <p class="col-md-12 texto-presentacion" style="word-wrap: break-word;">
                                    @if (isset($user['prospecto']['correo']))
                                        {{ $user['prospecto']['correo'] }}
                                    @else
                                        none
                                    @endif

                                </p>
                                <label for="" class="col-md-12 texto-presentacion">Celular</label>
                                <p class="col-md-12 texto-presentacion">77383273</p>
                            </div>
                        </div>
                        <div class="col-sm-12" style="display:none" id={{ $user['prospecto']['facebookId'] . 'label' }}>
                            <label for="" class="form-control labelito">
                                <p class="pesito" style="font-size: 0.4rem">
                                    (vacio)
                                </p>
                            </label>
                        </div>
                        <div class="col-sm-12" style="display: none" id={{ $user['prospecto']['facebookId'] . 'b' }}>
                            <button data-toggle="modal" data-target="#modalCustom" class="btn btn-primary button"
                                id="{{ json_encode($user['prospecto']) }}"
                                style="font-size: 10px; width: 100%; background: #8FE3CF; border: #8FE3CF">
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
            @foreach ($e2 as $user)
                <div class="list-group-item item" data-id={{ $user['prospecto']['facebookId'] }}>
                    <div class="row g-0">
                        <div class="col-md-12" style="height: 25px;">
                            <p class="text-muted" style="font-size: 0.7rem"><label for="">FB </label>
                                {{ $user['prospecto']['facebookId'] }}</p>
                        </div>
                        <div class="col-md-5">
                            <div class="row">
                                <div class="col-12">
                                    <div class="" id={{ 'notify' . $user['prospecto']['facebookId'] }}
                                        data-count={{ $user['numeroVeces'] }}>
                                        <img src={{ asset($user['prospecto']['imagen']) }} class="img-fluid rounded-start"
                                            alt="...">
                                    </div>
                                </div>
                                <p class="col-12 text-muted" style="font-size: 0.45rem; margin:5px"><label
                                        for="">Últ.vez</p>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="row g-0">
                                <label for="" class="col-md-12 texto-presentacion">Nombre</label>
                                <p class="col-md-12 texto-presentacion">{{ $user['prospecto']['nombre'] }}</p>
                                <label for="" class="col-md-12 texto-presentacion">Email</label>
                                <p class="col-md-12 texto-presentacion" style="word-wrap: break-word;">
                                    @if (isset($user['prospecto']['correo']))
                                        {{ $user['prospecto']['correo'] }}
                                    @else
                                        none
                                    @endif
                                </p>
                                <label for="" class="col-md-12 texto-presentacion">Celular</label>
                                <p class="col-md-12 texto-presentacion">6637263</p>
                            </div>
                        </div>
                        <div class="col-sm-12" id={{ $user['prospecto']['facebookId'] . 'label' }}>
                            <label for="" class="form-control labelito">
                                <p class="pesito" style="font-size: 0.5rem">
                                    (vacio)
                                </p>
                            </label>
                        </div>
                        <div class="col-sm-12" id={{ $user['prospecto']['facebookId'] . 'b' }}>
                            <button data-toggle="modal" data-target="#modalCustom" class="btn btn-primary button"
                                id="{{ json_encode($user['prospecto']) }}"
                                style="font-size: 10px; width: 100%; background: #8FE3CF; border: #8FE3CF">
                                <i class="fa fa-solid fa-comments"></i>
                                Comunicación
                            </button>
                        </div>
                        <div class="col-sm-12" style="display: none" id={{ $user['prospecto']['facebookId'] . 'p' }}>
                            <button class="btn btn-primary button"
                                style="font-size: 10px; width: 100%; background: #200d67; border: #200d67">
                                <i class="fa fa-solid fa-comments"></i>
                                Ver Pedidos
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
        <!--**************************ESTADO 3****************************************-->
        <div id="Clactivo" class="list-group col">
            <div class="list-group-item" style="background: #256D85; color:#fff">
                Cliente Activo
            </div>
            {{-- @foreach ($e3 as $user)
                <div class="list-group-item item" data-id="{{ $user->id }}">
                    <div class="row g-0">
                        <div class="col-md-12" style="display: inline-block;margin: 0px">
                            <p class="text-muted" style="float: left;margin: 0px"><label for="">Facebook
                                    Id </label> {{ $user->facebookid }}</p>
                        </div>
                        <div class="col-md-5">
                            <div class="row">
                                <div class="col-12">
                                    <div id="{{ 'notify' . $user->id }}" data-count="{{ count($user->visitas) }}">
                                        <img src="{{ asset($user->foto) }}" class="img-fluid rounded-start"
                                            alt="...">
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
                                <p class="col-md-12 texto-presentacion" style="word-wrap: break-word;">
                                    {{ $user->email }}
                                </p>
                                <label for="" class="col-md-12 texto-presentacion">Celular</label>
                                <p class="col-md-12 texto-presentacion">{{ $user->celular }}</p>
                            </div>
                        </div>
                        <div class="col-sm-12" style="display: none" id={{ $user->id . 'label' }}>
                            <label for="" class="form-control labelito">
                                <p class="pesito" style="font-size: 0.4rem">
                                    @if (count($user->contactos) > 0)
                                        {{ $user->contactos->last()->mensaje }}
                                    @else
                                        (Vacio)
                                    @endif
                                </p>
                            </label>
                        </div>
                        <div class="col-sm-12" style="display: none" id={{ $user->id . 'b' }}>
                            <button data-toggle="modal" data-target="#modalCustom" class="btn btn-primary button"
                                id="{{ $user }}"
                                style="font-size: 10px; width: 100%; background: #8FE3CF; border: #8FE3CF">
                                <i class="fa fa-solid fa-comments"></i>
                                Comunicación
                            </button>
                        </div>
                        <div class="col-sm-12" id={{ $user->id . 'p' }}>
                            <button class="btn btn-primary button"
                                style="font-size: 10px; width: 100%; background: #200d67; border: #200d67">
                                <i class="fa fa-solid fa-comments"></i>
                                Ver Pedidos
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
--}}
        </div>
        <!--**************************ESTADO 4****************************************-->
        <div id="Clhabitual" class="list-group col">
            <div class="list-group-item" style="background: #256D85; color:#fff">
                Cliente Habitual
            </div>
            {{-- @foreach ($e4 as $user)
                <div class="list-group-item item" data-id="{{ $user->id }}">
                    <div class="row g-0">
                        <div class="col-md-12" style="display: inline-block;margin: 0px">
                            <p class="text-muted" style="float: left;margin: 0px"><label for="">Facebook
                                    Id </label> {{ $user->facebookid }}</p>
                        </div>
                        <div class="col-md-5">
                            <div class="row">
                                <div class="col-12">
                                    <div id="{{ 'notify' . $user->id }}" data-count="{{ count($user->visitas) }}">
                                        <img src="{{ asset($user->foto) }}" class="img-fluid rounded-start"
                                            alt="...">
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
                                <p class="col-md-12 texto-presentacion" style="word-wrap: break-word;">
                                    {{ $user->email }}
                                </p>
                                <label for="" class="col-md-12 texto-presentacion">Celular</label>
                                <p class="col-md-12 texto-presentacion">{{ $user->celular }}</p>
                            </div>
                        </div>
                        <div class="col-sm-12" style="display: none" id={{ $user->id . 'label' }}>
                            <label for="" class="form-control labelito">
                                <p class="pesito" style="font-size: 0.4rem">
                                    @if (count($user->contactos) > 0)
                                        {{ $user->contactos->last()->mensaje }}
                                    @else
                                        (Vacio)
                                    @endif
                                </p>
                            </label>
                        </div>
                        <div class="col-sm-12" style="display: none" id={{ $user->id . 'b' }}>
                            <button data-toggle="modal" data-target="#modalCustom" class="btn btn-primary button"
                                id="{{ $user }}"
                                style="font-size: 10px; width: 100%; background: #8FE3CF; border: #8FE3CF">
                                <i class="fa fa-solid fa-comments"></i>
                                Comunicación
                            </button>
                        </div>
                        <div class="col-sm-12" style="display: none" id={{ $user->id . 'p' }}>
                            <button class="btn btn-primary button"
                                style="font-size: 10px; width: 100%; background: #200d67; border: #200d67">
                                
                                Ver Pedidos
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
--}}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">

    <style>
        /**CARD RADIO*/
        .card-input-element {
            display: none;
        }

        .card-input {
            margin: 10px;
            padding: 20px;
        }

        .card-input:hover {
            cursor: pointer;
        }

        .card-input-element:checked+.card-input {
            box-shadow: 0 0 1px 1px #2ecc71;
        }

        /**CENTRAR IMAGEN*/
        .centrar {
            object-fit: cover;
            left: 50%;
            top: -200px;

            margin: 5px;
            width: 100%;
            height: 85px;
        }

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
    <script src="{{ asset('js/app.js') }}" defer></script>

    <script>
        console.log('Hi!');

        new Sortable(Prentrante, {
            group: 'shared', // set both lists to same group
            draggable: ".item",
            animation: 150,
            store: {
                set: function(sortable) {
                    const sorts = sortable.toArray();
                    console.log('estado 1, sorts: ' + sorts);
                    const prospecto = [];
                    pos = 1;
                    sorts.forEach(element => {
                        patern = $('#Prentrante');
                        patern.find('#' + element + 'b').css('display', 'none');
                        patern.find('#' + element + 'p').css('display', 'none');
                        patern.find('#notify' + element).addClass('notify');
                        patern.find('#' + element + 'label').css('display', 'none');
                        const o = {
                            facebookId: element,
                            estado: 1,
                            posicion: pos
                        }
                        prospecto.push(o);
                        console.log(prospecto);
                        pos = pos + 1;
                    });
                    axios.post("https://bottopicos.herokuapp.com/api/prospecto/estado", {
                        prospecto: prospecto
                    }).then(res => console.log(res.data)).catch(function(
                        error) {
                        alert(error);
                    });
                }
            }
        });

        new Sortable(Prinicial, {
            group: 'shared',
            draggable: ".item",
            animation: 150,
            store: {
                set: function(sortable) {
                    const sorts = sortable.toArray();
                    console.log('estado 2, sorts: ' + sorts);
                    const prospecto = [];
                    pos = 1;
                    sorts.forEach(element => {
                        console.log('elemento: ' + element)
                        patern = $('#Prinicial');
                        patern.find('#' + element + 'b').css('display', 'block');
                        patern.find('#' + element + 'p').css('display', 'none');
                        patern.find('#notify' + element).removeClass('notify');

                        patern.find('#' + element + 'label').css('display', 'block');
                        const o = {
                            facebookId: element,
                            estado: 2,
                            posicion: pos
                        }
                        prospecto.push(o);
                        console.log(prospecto);
                        pos = pos + 1;
                    });

                    axios.post("https://bottopicos.herokuapp.com/api/prospecto/estado", {
                        prospecto: prospecto,
                    }).then(res => console.log(res.data)).catch(function(
                        error) {
                        alert(error);
                    });
                }
            }
        });

        new Sortable(Clactivo, {
            group: 'shared', // set both lists to same group
            draggable: ".item",
            animation: 150,
            store: {
                set: function(sortable) {
                    const sorts = sortable.toArray();
                    console.log('estado 3, sorts: ' + sorts);
                    sorts.forEach(element => {
                        patern = $('#Clactivo');
                        patern.find('#' + element + 'b').css('display', 'none');
                        patern.find('#' + element + 'p').css('display', 'block');
                        patern.find('#notify' + element).removeClass('notify');
                        patern.find('#' + element + 'label').css('display', 'none');
                    });
                    /*         axios.post("{{ route('api.prospecto.estadoTres') }}", {
                                 'sorts': sorts,
                             }).then(res => console.log(res.data)).catch(function(
                                 error) {
                                 alert(error);
                             });*/
                }
            }
        });

        new Sortable(Clhabitual, {
            group: 'shared',
            draggable: ".item",
            animation: 150,
            store: {
                set: function(sortable) {
                    const sorts = sortable.toArray();
                    console.log('estado 4, sorts: ' + sorts);
                    sorts.forEach(element => {
                        patern = $('#Clhabitual');
                        patern.find('#' + element + 'b').css('display', 'none');
                        patern.find('#' + element + 'p').css('display', 'none');
                        patern.find('#notify' + element).removeClass('notify');
                        patern.find('#' + element + 'label').css('display', 'none');
                    });
                    /*axios.post("{{ route('api.prospecto.estadoCuatro') }}", {
                        'sorts': sorts,
                    }).then(res => console.log(res.data)).catch(function(
                        error) {
                        alert(error);
                    });*/
                }
            }
        });
    </script>
    <script>
        $(document).ready(function() {
            //id = $('.prueba').attr('id');
            //console.log('id: ' + id);
            $('.button').on('click', function() {
                user = JSON.parse($(this).attr('id'));
                //console.log(user['_id']);
                foto = user['imagen'];
                $('#imagenM').attr('src', foto);
                contactar = $('#contactar');
                contactar.val(user['nombre']);
                contactar.prop('rounded', true);

            });
            $('#btnEnviar').on('click', function() {
                alert('Enviar Modal');
            })
            /*   let pila = [];
               $('.card-input-element').click(function() {
                   idPadre = $(this).closest('label');
                   contenedorHijo = idPadre.find('#' + idPadre.attr('id'));
                   if (pila.length()==0){
                       pila.push(contenedorHijo.attr('id'));
                       contenedorHijo.css('display', 'block');
                  
                   }
                   
                   console.log('id padre: ' + idPadre.attr('id'));
                   console.log('id hijo: ' + contenedorHijo.attr('id'));
               })*/
        });
    </script>
@stop
