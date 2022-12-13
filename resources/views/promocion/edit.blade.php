@extends('adminlte::page')

@section('title', 'Promocion')

@section('content_header')
    <h1>Editar Promocion</h1>
@stop

@section('content')
    <div id="promocion" class="list-group col">
        <form action="{{ route('promocion.update') }}" method="post">
            @method('put')
            @csrf

            <div class="row  form-group">
                <x-adminlte-input name="nombre" label="nombre" placeholder="nombre" disable-feedback id="nombre"
                    type="text" />
                <x-adminlte-input name="descuento" label="descuento" placeholder="descuento" disable-feedback id="descuento"
                    type="text" />
                <x-adminlte-input name="descripcion" label="descripcion" placeholder="descripcion" disable-feedback
                    id="descripcion" type="text" />
                <x-adminlte-input name="cantidadSillas" label="sillas" placeholder="sillas" disable-feedback id="sillas"
                    type="numeric" />
                <x-adminlte-input name="cantidadMesas" label="mesas" placeholder="mesas" disable-feedback id="mesas"
                    type="numeric" />
                <x-adminlte-select name="producto" label="Producto" label-class="text-lightblue" igroup-size="lg">
                    <x-slot name="prependSlot">
                        <div class="input-group-text bg-gradient-info">
                            <i class="fa fa-solid fa-store"></i>
                        </div>
                    </x-slot>
                    @foreach ($productos as $producto)
                        <option value={{ $producto['_id'] }}><strong>{{ $producto['nombre'] }}</strong>
                            <p>
                                @if (isset($producto['forma']))
                                    {{$producto['forma']}}
                                @endif
                            </p>
                        </option>
                    @endforeach

                    <!--  <button class="btn btn-success" type="submit">OK</button>-->
                </x-adminlte-select>
            </div>

            <button class="btn btn-success" type="submit">Guardar</button>
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
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#chofertarjeta').DataTable({
                language: {
                    lengthMenu: 'Mostrar _MENU_ registros por página',
                    zeroRecords: 'No se encontró nada - lo siento',
                    info: 'Mostrando la página _PAGE_ de _PAGES_',
                    infoEmpty: 'No hay registros disponibles',
                    infoFiltered: '(filtrado de _MAX_ registros totales)',
                    search: "Buscar",
                },
                scrollY: '280px',
                scrollCollapse: true,

            });
        });
    </script>
@stop
