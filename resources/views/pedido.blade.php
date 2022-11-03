@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    
@stop

@section('content')
    @php
        $i = 1;
    @endphp

    <div class="container pb-5 mt-n2 mt-md-n3 ">
        @foreach ($pedidos as $pedido)
            <div class="row mb-2" style="background: #D9D9D9">
                <div class="col-xl-9 col-md-8">
                    <h2 class="h6 d-flex flex-wrap justify-content-between align-items-center px-4 py-3 bg-primary">
                        <span id="pedidos">Pedido ({{ $i }})</span>
                    </h2>
                    @php
                        $i++;
                    @endphp
                    @foreach ($pedido['pedidoDetalle'] as $p)
                        <div class="d-sm-flex justify-content-between my-4 pb-4 border-bottom">
                            <div class="media d-block d-sm-flex text-center text-sm-left">
                                <div class="cart-item-thumb mx-auto mr-sm-4" style="height: 240px;width:240px"><img
                                        src="{{ asset($p['producto']['imagen']) }}" alt="Product"
                                        style="height: 90%; width: 90%"></div>
                                <div class="media-body pt-3">
                                    <h3 class="product-card-title font-weight-semibold border-0 pb-0 text-uppercase">
                                        <div>{{ $p['producto']['nombre'] }}</div>
                                    </h3>
                                    <div class="font-size-sm"><span class="text-muted mr-2">Precio
                                            Unitario:</span>{{ $p['producto']['precio'] . ' Bs' }}
                                    </div>
                                    <div class="font-size-sm"><span
                                            class="text-muted mr-2">Cantidad:</span>{{ $p['cantidad'] }}</div>
                                </div>
                            </div>

                            <!-- Item-->
                            <div class="pt-2 pt-sm-0 pl-sm-3 mx-auto mx-sm-0 text-center text-sm-left"
                                style="max-width: 10rem;">
                                <div class="form-group mb-2">
                                    <label for="quantity1">Subtotal</label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control subtotal" value={{ $p['sub_total'] }}
                                            aria-label="Amount (to the nearest dollar)" readonly>
                                        <span class="input-group-text">Bs</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    @endforeach
                </div>

                <!-- Item-->
                <div class="col-xl-3 col-md-4 pt-3 pt-md-0">
                    <h2 class="h6 px-4 py-3 bg-primary text-center">Total</h2>
                    <div class="h3 font-weight-semibold text-center py-3" id='total'>{{ $pedido['pedido']['monto'] }} Bs
                    </div>
                    <hr style="width: 230px">
                    <h2 class="h6 px-4 py-3 bg-info text-center">Detalles</h2>
                    <div class="font-size-sm"><span class="text-muted mr-2">Fecha: </span>{{ $pedido['pedido']['fecha'] }}
                    </div>
                    <div class="font-size-sm"><span class="text-muted mr-2">Hora: </span>{{ $pedido['pedido']['hora'] }}
                    </div>
                </div>
                {{--
    "_id": "636070a0d40a46eaaba1586c",
"fecha": "31/10/2022",
"hora": "21:04:32",
"monto": 500,
"cliente": "635ddbfd2814385e7a44db26",
    --}}
            </div>
            <!-- Sidebar-->
        @endforeach
    </div>
@stop

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        .cart-item-thumb {
            display: block;
            width: 10rem
        }

        .cart-item-thumb>img {
            display: block;
            width: 100%
        }

        .product-card-title>a {
            color: #222;
        }

        .font-weight-semibold {
            font-weight: 600 !important;
        }

        .product-card-title {
            display: block;
            margin-bottom: .75rem;
            padding-bottom: .875rem;
            border-bottom: 1px dashed #e2e2e2;
            font-size: 1rem;
            font-weight: normal;
        }

        .text-muted {
            color: #888 !important;
        }

        .bg-secondary {
            background-color: #f7f7f7 !important;
        }

        .accordion .accordion-heading {
            margin-bottom: 0;
            font-size: 1rem;
            font-weight: bold;
        }

        .font-weight-semibold {
            font-weight: 600 !important;
        }
    </style>

@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        console.log('hi');
    </script>
@stop
