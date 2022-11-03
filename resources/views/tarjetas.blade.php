@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Estados</h1>
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

                        <x-adminlte-input name="contactar" label="contactar" placeholder="contactar" disable-feedback
                            id="contactar" onmousedown="return false;" onkeypress="return false;" />
                        <input name="idcontactar" placeholder="idcontactar" type="text" id="idcontactar" hidden />
                        <x-adminlte-input name="id" label="admin" placeholder="admin" disable-feedback id="admin"
                            value="635a9f4d8b79539f79f13efe" />
                        <x-adminlte-select name="comunicacion_id" label="Medio" label-class="text-dark col-form-label">
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-gray">
                                    <i class="fa fa-solid fa-envelope"></i>
                                </div>
                            </x-slot>
                            <option value="celular">Celular</option>
                            <option value="correo">Email</i></option>
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
                                <x-adminlte-button theme="secondary" icon="fas fa-paper-plane" type="submit" label="Enviar"
                                    id="btnEnviar" />
        </form>
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
    </x-adminlte-modal>
    <!--modal pedidos -->
    <x-adminlte-modal id="modalMensajes" title="MENSAJES" size="lg" theme="dark" icon="fa fa-solid fa-store"
        v-centered static-backdrop scrollable>
        <div id='contenidoMensaje'>

        </div>
    </x-adminlte-modal>
    <div class="container page-container">
        <div class="row gutters">
            <div id="Prentrante" class="list-group col">
                <div class="list-group-item" style="background: #256D85; color:#fff">
                    PROSPECTO ENTRANTE
                </div>
                @foreach ($e1 as $user)
                    <figure class="user-card green list-group-item item" data-id="{{ $user['prospecto']['facebookId'] }}">
                        <figcaption>
                            <div class="notify" id={{ 'notify' . $user['prospecto']['facebookId'] }}
                                data-count={{ $user['numeroVeces'] }}>
                                <img src="{{ asset($user['prospecto']['imagen']) }}"
                                    alt="{{ $user['prospecto']['nombre'] }}" class="profile">
                            </div>
                            <h5>{{ $user['prospecto']['nombre'] }}</h5>
                            <h6>FB {{ $user['prospecto']['facebookId'] }}</h6>
                            @if (isset($user['prospecto']['celular']))
                                <p>
                                    {{ $user['prospecto']['celular'] }}
                                </p>
                            @endif

                            <h6>
                                @if (isset($user['prospecto']['correo']))
                                    {{ $user['prospecto']['correo'] }}
                                @endif
                            </h6>
                            <ul class="contacts" id={{ $user['prospecto']['facebookId'] . 'estado2' }}
                                style="display: none">
                                <li>
                                    <p><strong>Cant. Contactado: </strong>{{ $user['numeroVeces'] }} Veces</p>
                                </li>
                                <li>
                                    <p><strong>Fecha Contactado: </strong>
                                        @if (isset($user['fechaInicial']))
                                            {{ $user['fechaInicial'] }}
                                        @endif
                                    </p>
                                </li>
                                <li>
                                    <p><strong>Último Contacto: </strong>
                                        @if (isset($user['fechaUltima']))
                                            {{ $user['fechaUltima'] }}
                                        @endif
                                    </p>
                                </li>
                            </ul>


                            <div class="clearfix" id={{ $user['prospecto']['facebookId'] . 'estadob2' }}
                                style="display: none">
                                <button data-toggle="modal" data-target="#modalCustom"
                                    id="{{ json_encode($user['prospecto']) }}"
                                    class="btn badge badge-pill badge-info button"><i class="fa fa-solid fa-comments"></i>
                                    Comunicación</button>
                                <button data-toggle="modal" data-target="#modalMensajes"
                                    id="{{ json_encode($user['prospecto']) }}"
                                    class="btn badge badge-pill badge-success buttonMensaje"><i
                                        class="fa fa-solid fa-comments"></i>
                                    Mensaje</button>
                            </div>
                        </figcaption>
                    </figure>
                @endforeach
            </div>
            <!--ESTADO 2-->
            <div id="Prinicial" class="list-group col">
                <div class="list-group-item" style="background: #256D85; color:#fff">
                    PROSPECTO INICIAL
                </div>
                @foreach ($e2 as $user)
                    <figure class="user-card green list-group-item item" data-id="{{ $user['prospecto']['facebookId'] }}">
                        <figcaption>
                            <img src="{{ asset($user['prospecto']['imagen']) }}" alt="{{ $user['prospecto']['nombre'] }}"
                                class="profile">
                            <h5>{{ $user['prospecto']['nombre'] }}</h5>
                            <h6>FB {{ $user['prospecto']['facebookId'] }}</h6>
                            @if (isset($user['prospecto']['celular']))
                                <p>
                                    {{ $user['prospecto']['celular'] }}
                                </p>
                            @endif

                            <h6>
                                @if (isset($user['prospecto']['correo']))
                                    {{ $user['prospecto']['correo'] }}
                                @endif
                            </h6>
                            <ul class="contacts" id={{ $user['prospecto']['facebookId'] . 'estado2' }}>
                                <li>
                                    <p><strong>Cant. Contactado: </strong>{{ $user['numeroVeces'] }} Veces</p>
                                </li>
                                <li>
                                    <p><strong>Fecha Contactado: </strong>
                                        @if (isset($user['fechaInicial']))
                                            {{ $user['fechaInicial'] }}
                                        @endif
                                    </p>
                                </li>
                                <li>
                                    <p><strong>Último Contacto: </strong>
                                        @if (isset($user['fechaUltima']))
                                            {{ $user['fechaUltima'] }}
                                        @endif
                                    </p>
                                </li>
                            </ul>

                            <div class="clearfix" id={{ $user['prospecto']['facebookId'] . 'estadob2' }}>
                                <button data-toggle="modal" data-target="#modalCustom"
                                    id="{{ json_encode($user['prospecto']) }}"
                                    class="btn badge badge-pill badge-info button"><i class="fa fa-solid fa-comments"></i>
                                    Comunicación</button>
                                <button data-toggle="modal" data-target="#modalMensajes"
                                    id="{{ json_encode($user['prospecto']) }}"
                                    class="btn badge badge-pill badge-success buttonMensaje"><i
                                        class="fa fa-solid fa-comments"></i>
                                    Mensaje</button>
                            </div>
                        </figcaption>
                    </figure>
                @endforeach
            </div>
            <div id="Clactivo" class="list-group col">
                <div class="list-group-item" style="background: #256D85; color:#fff">
                    CLIENTE ACTIVO
                </div>
                @foreach ($e3 as $user)
                    <figure class="user-card list-group-item item green">
                        <figcaption>
                            <img src="{{ asset($user['cliente']['idPros']['imagen']) }}"
                                alt="{{ $user['cliente']['nombre'] }}" class="profile">
                            <h5>{{ $user['cliente']['nombre'] }}</h5>
                            <h6>FB {{ $user['cliente']['facebookId'] }}</h6>
                            @if (isset($user['cliente']['idPros']['celular']))
                                <p>
                                    {{ $user['cliente']['idPros']['celular'] }}
                                </p>
                            @endif

                            <h6>
                                @if (isset($user['cliente']['correo']))
                                    {{ $user['cliente']['correo'] }}
                                @endif
                            </h6>
                            <ul class="contacts">
                                <li>
                                    <p><strong>Cantidad Pedidos: </strong>{{ $user['numeroVeces'] }}</p>
                                </li>
                                <li>
                                    <p><strong>Último Pedido: </strong>
                                        {{ $user['fechaUltima'][0]['fecha'] }}
                                    </p>
                                </li>

                            </ul>
                            <div class="clearfix">
                                <a class="badge badge-pill badge-info"
                                    href={{ route('user.pedido', $user['cliente']['idPros']['facebookId']) }}>
                                    <i class="fa fa-solid fa-store"></i>
                                    Pedido
                                </a>
                            </div>
                        </figcaption>
                    </figure>
                @endforeach
            </div>
            <div id="Clhabitual" class="list-group col">
                <div class="list-group-item" style="background: #256D85; color:#fff">
                    CLIENTE HABITUAL
                </div>
                @foreach ($e4 as $user)
                    <figure class="user-card list-group-item item green" data-id={{ $user['cliente']['facebookId'] }}>
                        <figcaption>
                            <img src="{{ asset($user['cliente']['idPros']['imagen']) }}"
                                alt="{{ $user['cliente']['nombre'] }}" class="profile">
                            <h5>{{ $user['cliente']['nombre'] }}</h5>
                            <h6>FB {{ $user['cliente']['facebookId'] }}</h6>
                            @if (isset($user['cliente']['idPros']['celular']))
                                <p>
                                    {{ $user['cliente']['idPros']['celular'] }}
                                </p>
                            @endif

                            <h6>
                                @if (isset($user['cliente']['correo']))
                                    {{ $user['cliente']['correo'] }}
                                @endif
                            </h6>
                            <ul class="contacts">
                                <li>
                                    <p><strong>Último Pedido: </strong> {{ $user['fechaUltima'][0]['fecha'] }}</p>
                                </li>
                                <li>
                                    <p><strong>Frecuencia Pedidos: </strong>
                                        @if ($user['fecha'] == 0)
                                            {{ $user['fechaUltima'][0]['fecha'] }}
                                        @else
                                            {{ $user['fecha'] }} días
                                        @endif
                                    </p>
                                </li>
                                <li>
                                    <p><strong>Promedio Compra: </strong>
                                        {{ round($user['promedioCompra'], 2) }} Bs
                                    </p>
                                </li>

                            </ul>
                            <div class="clearfix">
                                <a class="badge badge-pill badge-info"
                                    href={{ route('user.pedido', $user['cliente']['idPros']['facebookId']) }}>
                                    <i class="fa fa-solid fa-store"></i>
                                    Pedidos
                                </a>
                                <a class="badge badge-pill badge-success" href="#">
                                    <i class="fa fa-solid fa-comments"></i>
                                    Notificación
                                </a>
                            </div>
                        </figcaption>
                    </figure>
                @endforeach
            </div>


        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.1/dist/css/bootstrap.min.css" rel="stylesheet">


    <style type="text/css">
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

        body {
            background: #eee;
        }

        .page-container {
            margin-top: 40px;
        }

        figure.user-card {
            background: #ffffff;
            padding: 20px;
            border-top: 3px solid #f2f2f2;
            border: 1px solid #e1e5f1;
            text-align: center;
        }

        figure.user-card.red {
            border-top: 3px solid #fc6d4c;
        }

        figure.user-card.green {
            border-top: 3px solid #3ecfac;
        }

        figure.user-card.blue {
            border-top: 3px solid #5a99ee;
        }

        figure.user-card.yellow {
            border-top: 3px solid #ffc139;
        }

        figure.user-card.orange {
            border-top: 3px solid #ff5000;
        }

        figure.user-card.teal {
            border-top: 3px solid #47BCC7;
        }

        figure.user-card.pink {
            border-top: 3px solid #ff9fd0;
        }

        figure.user-card.brown {
            border-top: 3px solid #79574b;
        }

        figure.user-card.purple {
            border-top: 3px solid #904e95;
        }

        figure.user-card.fb {
            border-top: 3px solid #3B5998;
        }

        figure.user-card.gp {
            border-top: 3px solid #E02F2F;
        }

        figure.user-card .profile {
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
            max-width: 72px;
            margin-bottom: 20px;
        }

        figure.user-card h5 {
            margin: 0 0 15px 0;
        }

        figure.user-card h6 {
            margin: 0 0 15px 0;
            color: #8796af;
            font-size: 14px;
        }

        figure.user-card p {
            margin: 0;
            padding: 0 0 0 0;
            color: #8796af;
            line-height: 150%;
            font-size: .85rem;
        }

        figure.user-card ul.contacts {
            margin: 0;
            padding: 0 0 0 0;
            line-height: 150%;
            font-size: .85rem;
        }

        figure.user-card ul.contacts li {
            padding: .2rem 0;
        }

        figure.user-card ul.contacts li a {
            color: #5a99ee;
        }

        figure.user-card ul.contacts li a i {
            min-width: 36px;
            float: left;
            font-size: 1rem;
        }

        figure.user-card ul.contacts li:last-child a {
            color: #ff5000;
        }

        ul li {
            list-style-type: none;
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>

    <script>
        console.log('Hi!');
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.button').on('click', function() {
                user = JSON.parse($(this).attr('id'));
                console.log(user);
                foto = user['imagen'];
                $('#imagenM').attr('src', foto);
                contactar = $('#contactar');
                idcontactar = $('#idcontactar');
                contactar.val(user['correo']);
                idcontactar.val(user['_id']);
                contactar.prop('rounded', true);
            });
            $('.buttonMensaje').on('click', async function() {
                $('#contenidoMensaje').empty();
                user = JSON.parse($(this).attr('id'));
                console.log('user:' + user['_id']);
                let datos = await sendPostRequest(user['_id']);
                console.log(datos);
                for (let index = 0; index < datos['mensaje'].length; index++) {

                    elemento = '<div class="col-md-12">' +
                        '<div class="card mb-3 p-3">' +
                        '<h5 class="card-title px-3">' + 'Mensaje' + '</h5>' +
                        '<p class="card-text px-3 py-2" style="height:10px">' + '<label>' + 'De: ' +
                        '</label>' +
                        datos['usuarios'][index]['nombre'] + '</p>' +
                        '<p class="card-text px-3 py-2" style="height:10px">' + '<label>' + 'Medio: ' +
                        '</label>' +
                        datos['mensaje'][index]['medio'] + '</p>' +
                        '<p class="card-text px-3 py-2" style="height:10px">' + '<label>' +
                        'Mensaje: ' +
                        '</label>' + datos['mensaje'][index]['mensaje'] + '</p>' +
                        '<p class="card-text px-3 py-2" style="height:10px">' +
                        '<small class="text-muted">' +
                        datos['mensaje'][index]['fecha'] + ' ' + datos['mensaje'][index]['hora'] +
                        '</small>' +
                        '</p>' +
                        '</div>' +
                        '</div>';
                    // console.log('elemento: ' + elemento);
                    //console.log(msje[index]);
                    $('#contenidoMensaje').append(elemento);
                }
            });
            
            const sendPostRequest = async (id) => {
                try {
                    const resp = await axios.post(
                        'https://bottopicos.herokuapp.com/api/prospecto/contactar/mensaje', {
                            'id': id
                        });
                    //console.log(resp.data);
                    return resp.data;
                } catch (err) {
                    // Handle Error Here
                    console.error(err);
                }
            };
           
        });
        //setInterval(location.reload(),60000000);
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
                        patern.find('#' + element + 'estadob2').css('display', 'none');
                        patern.find('#' + element + 'estado2').css('display', 'none');
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
                        patern.find('#' + element + 'estadob2').css('display', 'block');
                        patern.find('#' + element + 'estado2').css('display', 'block');
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
                    location.reload();
                }
            }
        });

        /* new Sortable(Clactivo, {
             group: 'shared', // set both lists to same group
             draggable: ".item",
             animation: 150,
             store: {

                 set: function(sortable) {
                     /*  const sorts = sortable.toArray();
                       console.log('estado 3, sorts: ' + sorts);
                       const prospecto = [];
                       pos = 1;
                       sorts.forEach(element => {
                           //console.log('elemento, estado 3: '+element);

                           patern = $('#Clactivo');
                           patern.find('#' + element + 'p').css('display', 'block');
                           patern.find('#ult' + element).css('display', 'none');
                           patern.find('#' + element + 'b').css('display', 'none');
                           patern.find('#' + element + 'bn').css('display', 'none');
                           patern.find('#' + element + 'dp').show();
                           patern.find('#' + element + 'up').hide();
                           patern.find('#' + element + 'dfp').hide();
                           patern.find('#notify' + element).removeClass('notify');
                           patern.find('#' + element + 'label').css('display', 'none');
                           const o = {
                               facebookId: element,
                               estado: 3,
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

         new Sortable(Clhabitual, {
             group: 'shared',
             draggable: ".item",
             animation: 150,
             store: {
                 set: function(sortable) {
                     const sorts = sortable.toArray();
                     console.log('estado 4, sorts: ' + sorts);
                     /* sorts.forEach(element => {
                          patern = $('#Clhabitual');
                          patern.find('#ult' + element).css('display', 'none');
                          patern.find('#' + element + 'b').css('display', 'none');

                          patern.find('#' + element + 'bn').css('display', 'block');
                          patern.find('#' + element + 'p').css('display', 'none');

                          patern.find('#' + element + 'dp').hide();
                          patern.find('#' + element + 'up').show();

                          patern.find('#' + element + 'dfp').show();
                          patern.find('#notify' + element).removeClass('notify');
                          patern.find('#' + element + 'label').css('display', 'none');
                      });*/
        /*axios.post("{{ route('api.prospecto.estadoCuatro') }}", {
                            'sorts': sorts,
                        }).then(res => console.log(res.data)).catch(function(
                            error) {
                            alert(error);
                        });
                    }
                }
            });*/
    </script>
@stop
