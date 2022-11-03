@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')

    <!--modal pedidos -->
    <x-adminlte-modal id="modalMensajes" title="MENSAJES" size="lg" theme="dark" icon="fa fa-solid fa-store" v-centered
        static-backdrop scrollable>
        <div id='contenidoMensaje'>

        </div>
    </x-adminlte-modal>
    <!--modal pedidos -->
    <x-adminlte-modal id="modalPedidos" title="PEDIDOS" size="lg" theme="dark" icon="fa fa-solid fa-store" v-centered
        static-backdrop scrollable>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">FOTO</th>
                    <th scope="col">NOMBRE</th>
                    <th scope="col">CANTIDAD</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row"><img src="{{ asset('fotos/PEDIDO1.png') }}" alt=""
                            style="width: 50px; height: auto;"></th>
                    <td>Silla de plástico</td>
                    <td>24</td>
                </tr>
                <tr>
                    <th scope="row"><img src="{{ asset('fotos/PEDIDO2.png') }}" alt=""
                            style="width: 50px; height: auto;"></th>
                    <td>Mesa</td>
                    <td>6</td>
                </tr>
                <tr>
                    <th scope="row"><img src="{{ asset('fotos/PEDIDO3.png') }}" alt=""
                            style="width: 50px; height: auto;"></th>
                    <td>Mesa de metal</td>
                    <td>5</td>
                </tr>
            </tbody>
        </table>

        {{--            <button type="submit" class="btn btn-success">Guardar</button> --}}

    </x-adminlte-modal>
    <!--modal-->
    <x-adminlte-modal id="modalCustom" title="COMUNICACIÓN" size="lg" theme="teal" icon="fa fa-solid fa-comments"
        v-centered static-backdrop scrollable>

        <form action="{{ route('comunicacion2.store') }}" method="post">
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

        {{--            <button type="submit" class="btn btn-success">Guardar</button> --}}

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
                                <p class="col-12 text-muted" style="font-size: 0.45rem; margin:5px" id={{'ult'.$user['prospecto']['facebookId']}}><label
                                        for="">Últ.vez </label> {{ $user['ultimoIngreso'][0]['entrada'] }}</p>
                                <div class="mt-1" id={{ $user['prospecto']['facebookId'] . 'p' }}>
                                    <a class="btn btn-primary"
                                        href="{{ route('user.pedido', $user['prospecto']['facebookId']) }}"
                                        style="display:none;height: 35px;font-size: 7px; width: 90%; background: #8FE3CF; border: #8FE3CF">
                                        <i class="fa fa-solid fa-store"></i>
                                        Pedidos
                                    </a>
                                </div>
                                <div class="row" id={{ $user['prospecto']['facebookId'] . 'dfp' }}
                                    style="display: none">
                                    <label for="" class="col-12 texto-presentacion">F.Pedidos</label>
                                    <p class="col-12 texto-presentacion" style="">3.2 ped/mes</p>
                                    <label for="" class="col-12 texto-presentacion"
                                        style="">P.Compras</label>
                                    <p class="col-12 texto-presentacion" style="">245.5 Bs</p>
                                </div>
                                <div class="row" id={{ $user['prospecto']['facebookId'] . 'e2' }} style="display: none">
                                    <label for="" class="col-12 texto-presentacion">Cant. Contacto</label>
                                    {{--
                                        "numeroVeces": 1,
"fechaInicial": "3/11/2022",
"fechaUltima": "3/11/2022" --}}
                                    <p class="col-12 texto-presentacion" style="">@if (isset($user['numeroVeces']))
                                        {{ $user['numeroVeces'] }}
                                    @endif</p>
                                    <label for="" class="col-12 texto-presentacion" style="">Contacto
                                        Inicial</label>
                                    <p class="col-12 texto-presentacion" style="">@if (isset($user['fechaInicial']))
                                        {{ $user['fechaInicial'] }}
                                    @endif</p>
                                    <label for="" class="col-12 texto-presentacion" style="">Ult.
                                        Contacto</label>
                                    <p class="col-12 texto-presentacion" style="">@if (isset($user['fechaInicial']))
                                        {{ $user['fechaInicial'] }}
                                    @endif</p>
                                </div>
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
                                <p class="col-md-12 texto-presentacion">
                                    @if (isset($user['prospecto']['celular']))
                                        {{ $user['prospecto']['celular'] }}
                                    @else
                                        none
                                    @endif
                                </p>
                                <div class="row px-0" id={{ $user['prospecto']['facebookId'] . 'dp' }}
                                    style="display:none">
                                    <label for="" class="col-12 texto-presentacion">Ult. Pedido</label>
                                    <p class="col-12 texto-presentacion" style="">2022/03/12</p>
                                    <label for="" class="col-12 texto-presentacion"
                                        style="">Cant.Pedido</label>
                                    <p class="col-12 texto-presentacion" style="">32</p>
                                </div>
                                <div class="row px-0" id={{ $user['prospecto']['facebookId'] . 'up' }}
                                    style="display: none">
                                    <label for="" class="col-12 texto-presentacion">Ult. Pedido</label>
                                    <p class="col-12 texto-presentacion" style="">2022/03/12</p>
                                    <label for="" class="col-12 texto-presentacion"
                                        style="">Notificaciones</label>
                                    <p class="col-12 texto-presentacion" style="">5</p>
                                </div>
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
                        <div class="col-sm-12" id='41bn' style="display: none">
                            <button data-toggle="modal" class="btn btn-primary"
                                style="font-size: 10px; width: 100%; background: #8FE3CF; border: #8FE3CF">
                                <i class="fa fa-solid fa-comments"></i>
                                Detalle Notificación
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
                                <p class="col-12 text-muted" id={{ 'ult' . $user['prospecto']['facebookId'] }}
                                    style="display:none; font-size: 0.45rem; margin:5px"><label for="">Últ.vez </p>
                                <div class="mt-1" id={{ $user['prospecto']['facebookId'] . 'p' }}
                                    style="display: none">
                                    <a class="btn btn-primary"
                                        href="{{ route('user.pedido', $user['prospecto']['facebookId']) }}"
                                        style="height: 35px;font-size: 7px; width: 90%; background: #8FE3CF; border: #8FE3CF">
                                        <i class="fa fa-solid fa-store"></i>
                                        Pedidos
                                    </a>
                                </div>

                                <div class="row" id={{ $user['prospecto']['facebookId'] . 'dfp' }}
                                    style="display: none">
                                    <label for="" class="col-12 texto-presentacion">F.Pedidos</label>
                                    <p class="col-12 texto-presentacion" style="">3.2 ped/mes</p>
                                    <label for="" class="col-12 texto-presentacion"
                                        style="">P.Compras</label>
                                    <p class="col-12 texto-presentacion" style="">245.5 Bs</p>
                                </div>
                                <div class="row" id={{ $user['prospecto']['facebookId'] . 'e2' }}>
                                    <label for="" class="col-12 texto-presentacion">Cant. Contacto</label>
                                    {{--
                                        "numeroVeces": 1,
"fechaInicial": "3/11/2022",
"fechaUltima": "3/11/2022" --}}
                                    <p class="col-12 texto-presentacion" style="">{{ $user['numeroVeces'] }}</p>
                                    <label for="" class="col-12 texto-presentacion" style="">Contacto
                                        Inicial</label>
                                    <p class="col-12 texto-presentacion" style="">{{ $user['fechaInicial'] }}</p>
                                    <label for="" class="col-12 texto-presentacion" style="">Ult.
                                        Contacto</label>
                                    <p class="col-12 texto-presentacion" style="">{{ $user['fechaUltima'] }}</p>
                                </div>
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
                                <div class="row px-0" id={{ $user['prospecto']['facebookId'] . 'dp' }}
                                    style="display:none">
                                    <label for="" class="col-12 texto-presentacion">Ult. Pedido</label>
                                    <p class="col-12 texto-presentacion" style="">2022/03/12</p>
                                    <label for="" class="col-12 texto-presentacion"
                                        style="">Cant.Pedido</label>
                                    <p class="col-12 texto-presentacion" style="">32</p>
                                </div>

                                <div class="row px-0" id={{ $user['prospecto']['facebookId'] . 'up' }}
                                    style="display: none">
                                    <label for="" class="col-12 texto-presentacion">Ult. Pedido</label>
                                    <p class="col-12 texto-presentacion" style="">2022/03/12</p>
                                    <label for="" class="col-12 texto-presentacion"
                                        style="">Notificaciones</label>
                                    <p class="col-12 texto-presentacion" style="">5</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12" id={{ $user['prospecto']['facebookId'] . 'label' }} style="display: none">
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
                        <div class="col-sm-12" id={{ $user['prospecto']['facebookId'] . 'vb' }}>
                            <button data-toggle="modal" data-target="#modalMensajes"
                                class="btn btn-primary buttonMensaje" id="{{ json_encode($user['prospecto']) }}"
                                style="font-size: 10px; width: 100%; background: #8FE3CF; border: #8FE3CF">
                                <i class="fa fa-solid fa-comments"></i>
                                Mensajes
                            </button>
                        </div>
                        <div class="col-sm-12" id='41bn' style="display: none">
                            <button data-toggle="modal" class="btn btn-primary"
                                style="font-size: 10px; width: 100%; background: #8FE3CF; border: #8FE3CF">
                                <i class="fa fa-solid fa-comments"></i>
                                Detalle Notificación
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
            <!--SIN FOR-->
            @foreach ($e3 as $user)
                <div class="list-group-item item" data-id={{ $user['cliente']['idPros']['facebookId'] }}>
                    <div class="row g-0">
                        <div class="col-md-12" style="height: 25px;">
                            <p class="text-muted" style="font-size: 0.7rem"><label for="">FB </label>
                                {{ $user['cliente']['idPros']['facebookId'] }}</p>
                        </div>
                        <div class="col-md-5">
                            <div class="row">
                                <div class="col-12">
                                    <div class="border"
                                        style="  display: inline-block;padding: 5px;box-sizing: border-box;float:left; width: 90%; height: 110px;">
                                        {{-- object-fit: cover;top: 50% --}}
                                        <img src="{{ asset($user['cliente']['idPros']['imagen']) }}" alt=""
                                            id="imagenM" style="width:100%; height:100%;">

                                    </div>
                                </div>
                                <p class="col-12 text-muted" id={{ 'ult' . $user['cliente']['idPros']['facebookId'] }}
                                    style="font-size: 0.45rem; margin:5px; display:none"><label for="">Últ.vez
                                    </label></p>
                                <div class="mt-1" id={{ $user['cliente']['idPros']['facebookId'] . 'p' }}>

                                    <a class="btn btn-primary"
                                        href={{ route('user.pedido', $user['cliente']['idPros']['facebookId']) }}
                                        style="height: 35px;font-size: 7px; width: 90%; background: #8FE3CF; border: #8FE3CF">
                                        <i class="fa fa-solid fa-store"></i>
                                        Pedidos
                                    </a>
                                </div>

                                <div class="row" id='31dfp' style="display: none">
                                    <label for="" class="col-12 texto-presentacion">F.Pedidos</label>
                                    <p class="col-12 texto-presentacion" style="">3.2 ped/mes</p>
                                    <label for="" class="col-12 texto-presentacion"
                                        style="">P.Compras</label>
                                    <p class="col-12 texto-presentacion" style="">245.5 Bs</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="row g-0">
                                <label for="" class="col-md-12 texto-presentacion">Nombre</label>
                                <p class="col-md-12 texto-presentacion">{{ $user['cliente']['idPros']['nombre'] }}</p>
                                <label for="" class="col-md-12 texto-presentacion">Email</label>
                                <p class="col-md-12 texto-presentacion" style="word-wrap: break-word;">
                                    @if (isset($user['cliente']['idPros']['correo']))
                                        {{ $user['cliente']['idPros']['correo'] }}
                                    @else
                                        none
                                    @endif
                                </p>
                                <label for="" class="col-md-12 texto-presentacion">Celular</label>
                                <p class="col-md-12 texto-presentacion">
                                    @if (isset($user['cliente']['celular']))
                                        {{ $user['cliente']['celular'] }}
                                    @else
                                        none
                                    @endif
                                </p>
                                <div class="row px-0" id='31dp'>
                                    <label for="" class="col-12 texto-presentacion">Ult. Pedido</label>
                                    <p class="col-12 texto-presentacion" style="">2022/03/12</p>
                                    <label for="" class="col-12 texto-presentacion"
                                        style="">Cant.Pedido</label>
                                    <p class="col-12 texto-presentacion" style="">32</p>
                                </div>
                                <div class="row px-0" id='31up' style="display: none">
                                    <label for="" class="col-12 texto-presentacion">Ult. Pedido</label>
                                    <p class="col-12 texto-presentacion" style="">2022/03/12</p>
                                    <label for="" class="col-12 texto-presentacion"
                                        style="">Notificaciones</label>
                                    <p class="col-12 texto-presentacion" style="">5</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12" style="display: none" id='31label'>
                            <label for="" class="form-control labelito">
                                <p class="pesito" style="font-size: 0.4rem">
                                    Vende productos de sillas
                                </p>
                            </label>
                        </div>
                        <div class="col-sm-12" style="display: none" id='31b'>
                            <button data-toggle="modal" class="btn btn-primary"
                                style="font-size: 10px; width: 100%; background: #8FE3CF; border: #8FE3CF">
                                <i class="fa fa-solid fa-comments"></i>
                                Comunicación
                            </button>
                        </div>

                        <div class="col-sm-12" id='31bn' style="display: none">
                            <button data-toggle="modal" class="btn btn-primary"
                                style="font-size: 10px; width: 100%; background: #8FE3CF; border: #8FE3CF">
                                <iconify-icon icon="bx:bell"></iconify-icon>
                                Detalle Notificación
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <!--**************************ESTADO 4****************************************-->
        <div id="Clhabitual" class="list-group col">
            <div class="list-group-item" style="background: #256D85; color:#fff">
                Cliente Habitual
            </div>
            @foreach ($e4 as $user)
                <div class="list-group-item item" data-id="41">
                    <div class="row g-0">
                        <div class="col-md-12" style="height: 25px;">
                            <p class="text-muted" style="font-size: 0.7rem"><label for="">FB </label>
                                {{ $user['cliente']['facebookId'] }}</p>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-12 mb-2" style="height: 70px">

                                    {{-- object-fit: cover;top: 50% --}}
                                    <img src="{{ asset($user['cliente']['idPros']['imagen']) }}" alt=""
                                        id="imagenM" class="img-fluid rounded-start" style="width:100%; height:100%;">

                                </div>
                                <p class="col-12 text-muted" id={{ 'ult' . $user['cliente']['facebookId'] }}
                                    style="font-size: 0.45rem; margin:5px; display:none"><label for="">Últ.vez
                                    </label> 2022/02/12</p>
                                <div class="mt-1" id={{ $user['cliente']['facebookId'] . 'p' }} style="display:none">
                                    <a class="btn btn-primary"
                                        href="{{ route('user.pedido', $user['cliente']['facebookId']) }}"
                                        style="height: 35px;font-size: 7px; width: 90%; background: #8FE3CF; border: #8FE3CF">
                                        <i class="fa fa-solid fa-store"></i>
                                        Pedidos
                                    </a>
                                </div>
                                <div class="row" id={{ $user['cliente']['facebookId'] . 'dfp' }}>
                                    <label for="" class="col-12 texto-presentacion">F.Pedidos</label>

                                    @if ($user['fecha'] == 0)
                                        <p class="col-12 texto-presentacion" style="">
                                            {{ $user['fechaUltima'][0]['fecha'] }}</p>
                                    @else
                                        <p class="col-12 texto-presentacion" style="">{{ $user['fecha'] }} días</p>
                                    @endif

                                    <label for="" class="col-12 texto-presentacion"
                                        style="">P.Compras</label>
                                    <p class="col-12 texto-presentacion" style="">
                                        {{ round($user['promedioCompra'], 2) }} Bs
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row g-0">
                                <label for="" class="col-md-12 texto-presentacion">Nombre</label>
                                <p class="col-md-12 texto-presentacion">{{ $user['cliente']['nombre'] }}</p>
                                <label for="" class="col-md-12 texto-presentacion">Email</label>
                                <p class="col-md-12 texto-presentacion" style="word-wrap: break-word;">
                                    @if (isset($user['cliente']['correo']))
                                        {{ $user['cliente']['correo'] }}
                                    @else
                                        sin correo
                                    @endif
                                </p>
                                <label for="" class="col-md-12 texto-presentacion">Celular</label>
                                <p class="col-md-12 texto-presentacion">
                                    @if (isset($user['cliente']['celular']))
                                        {{ $user['cliente']['celular'] }}
                                    @else
                                        sin celular
                                    @endif
                                </p>
                                <div class="row px-0" id={{ $user['cliente']['facebookId'] . 'dp' }}
                                    style="display: none">
                                    <label for="" class="col-12 texto-presentacion">Ult. Pedido</label>
                                    <p class="col-12 texto-presentacion" style="">2022/03/12</p>
                                    <label for="" class="col-12 texto-presentacion"
                                        style="">Cant.Pedido</label>
                                    <p class="col-12 texto-presentacion" style="">32</p>
                                </div>
                                <div class="row px-0" id={{ $user['cliente']['facebookId'] . 'up' }}>
                                    <label for="" class="col-12 texto-presentacion">Ult. Pedido</label>
                                    <p class="col-12 texto-presentacion" style="">
                                        {{ $user['fechaUltima'][0]['fecha'] }}</p>
                                    <label for="" class="col-12 texto-presentacion"
                                        style="">Notificaciones</label>
                                    <p class="col-12 texto-presentacion" style="">5</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12" style="display: none" id={{ $user['cliente']['facebookId'] . 'label' }}>
                            <label for="" class="form-control labelito">
                                <p class="pesito" style="font-size: 0.4rem">
                                    Vende productos de sillas
                                </p>
                            </label>
                        </div>
                        <div class="col-sm-12" style="display: none" id={{ $user['cliente']['facebookId'] . 'b' }}>
                            <button data-toggle="modal" class="btn btn-primary"
                                style="font-size: 10px; width: 100%; background: #8FE3CF; border: #8FE3CF">
                                <i class="fa fa-solid fa-comments"></i>
                                Comunicación
                            </button>
                        </div>
                        <div class="col-sm-6" id={{ $user['cliente']['facebookId'] . 'bp' }}>
                            <a class="btn btn-primary" href="{{ route('user.pedido', $user['cliente']['facebookId']) }}"
                                style="font-size: 7px; width: 90%; background: #8FE3CF; border: #8FE3CF">
                                <i class="fa fa-solid fa-store"></i>
                                Pedidos
                            </a>
                        </div>
                        <div class="col-sm-6" id={{ $user['cliente']['facebookId'] . 'bn' }}>
                            <button data-toggle="modal" class="btn btn-primary"
                                style="font-size: 7px; width: 90%; background: #8FE3CF; border: #8FE3CF">
                                <i class="fa fa-solid fa-comments"></i>
                                Notificación
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach

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
        //   setInterval(location.reload(),300000);
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
                        patern.find('#ult' + element).css('display', 'block');
                        patern.find('#' + element + 'dp').css('display', 'none');
                        patern.find('#' + element + 'b').css('display', 'none');

                        patern.find('#' + element + 'bn').css('display', 'none');
                        patern.find('#' + element + 'p').css('display', 'none');

                        patern.find('#' + element + 'up').css('diplay', 'none');
                        patern.find('#' + element + 'dp').css('display', 'none');
                        patern.find('#' + element + 'dfp').css('display', 'none');
                        patern.find('#notify' + element).addClass('notify');
                        patern.find('#' + element + 'label').css('display', 'none');
                        
                        patern.find('#' + element + 'e2').css('display', 'none');
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

                        patern.find('#' + element + 'bn').css('display', 'none');
                        patern.find('#' + element + 'p').css('display', 'none');
                        patern.find('#notify' + element).removeClass('notify');
                        patern.find('#' + element + 'up').css('diplay', 'none');
                        patern.find('#' + element + 'dp').css('display', 'none');
                        patern.find('#' + element + 'dfp').css('display', 'none');
                        
                        patern.find('#' + element + 'e2').css('display', 'block');
                        patern.find('#ult' + element).css('display', 'none');
                        // patern.find('#' + element + 'label').css('display', 'block');
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

        /*  new Sortable(Clactivo, {
              group: 'shared', // set both lists to same group
              draggable: ".item",
              animation: 150,
              store: {

                  set: function(sortable) {
                      const sorts = sortable.toArray();
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
                      const prospecto = [];
                      pos = 1;
                       sorts.forEach(element => {
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
                           const o = {
                              facebookId: element,
                              estado: 3,
                              posicion: pos
                          }
                          prospecto.push(o);
                          console.log(prospecto);
                          pos = pos + 1;
                       });
                   
                  }
              }
          });*/
    </script>
    <script>
        <script src="https://code.iconify.design/iconify-icon/1.0.1/iconify-icon.min.js"></script>
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
        });
        //id = $('.prueba').attr('id');
        //console.log('id: ' + id);


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
                    '<p class="card-text px-3 py-2" style="height:10px">' + '<label>' + 'De: ' + '</label>' +
                    datos['usuarios'][index]['nombre'] + '</p>' +
                    '<p class="card-text px-3 py-2" style="height:10px">' + '<label>' + 'Medio: ' + '</label>' +
                    datos['mensaje'][index]['medio'] + '</p>' +
                    '<p class="card-text px-3 py-2" style="height:10px">' + '<label>' + 'Mensaje: ' +
                    '</label>' + datos['mensaje'][index]['mensaje'] + '</p>' +
                    '<p class="card-text px-3 py-2" style="height:10px">' +
                    '<small class="text-muted">' +
                    datos['mensaje'][index]['fecha'] + ' ' + datos['mensaje'][index]['hora'] + '</small>' +
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
                const resp = await axios.post('https://bottopicos.herokuapp.com/api/prospecto/contactar/mensaje', {
                    'id': id
                });
                //console.log(resp.data);
                return resp.data;
            } catch (err) {
                // Handle Error Here
                console.error(err);
            }
        };
    </script>
@stop
