@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    @if (session('eliminar-promocion'))
        <div class="bg-danger text-white rounded p-lg-3">
            {{ session('eliminar-promocion') }}
        </div>
    @endif
    @if (session('crear-promocion'))
    <div class="bg-success text-white rounded p-lg-3">
        {{ session('crear-promocion') }}
    </div>
@endif
@stop

@section('content')

   
    <div class="card">
        <div class="card-header">
            <a class="btn btn-primary" href="{{ route('promocion.create') }}">Crear Promocion</a>
        </div>
        <div class="card-body">
            <table id="tabla" class="table table-striped shadow-lg mt-4" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NOMBRE</th>
                        <th>DESCRIPCION</th>
                        <th>DESCUENTO</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($promociones as $promo)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $promo['promocion']['nombre'] }}</td>
                            <td>{{ $promo['promocion']['descripcion'] }}</td>
                            <td>{{ $promo['promocion']['descuento'] }}</td>
                            <td>
                                @if ($promo['promocion']['estado'])
                                    <strong class="bg-success text-white">Activo</strong>
                                @else
                                    <strong class="bg-danger text-white">Inactivo</strong>
                                @endif
                            </td>
                            <td>
                                <a href="" class="btn btn-primary">Editar</a>
                                <form action="{{ route('promocion.eliminar', $promo['_id']) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Eliminar</a>
                                </form>

                            </td>
                        </tr>
                        @php
                            $i = $i + 1;
                        @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap4.min.css">
@stop

@section('js')
    <!-- jsDelivr :: Sortable :: Latest (https://www.jsdelivr.com/package/npm/sortablejs) -->
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>

    <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/responsive.bootstrap4.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script>
        $(document).ready(function() {

            $('#tabla').DataTable({
                responsive: true,
                autoWidth: false,
                language: {
                    lengthMenu: 'Mostrar' + `
    <select class="custom-select custom-select-sm form-control form-control-sm">
        <option value="10">10</option>
        <option value="25">25</option>
        <option value="50">50</option>
        <option value="100">100</option>
        <option value="-1">Todo</option>
    </select>   
    ` + ' registros por página',
                    zeroRecords: 'Nada encontrado - lo siento',
                    info: 'Mostrando la página _PAGE_ de _PAGES_',
                    infoEmpty: 'No hay registros disponible',
                    infoFiltered: '(filtrado de _MAX_ registros totales)',
                    search: 'Buscar:',
                    paginate: {
                        next: 'Siguiente',
                        previous: 'Anterior'
                    }
                },
            });
        });
    </script>
@stop
