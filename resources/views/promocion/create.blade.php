@extends('adminlte::page')

@section('title', 'Promocion')

@section('content_header')
    <h1>Crear Promocion</h1>
@stop

@section('content')
    <div id="promocion" class="list-group col">
        <form action="{{ route('promocion.store') }}" method="post" enctype="multipart/form-data">
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
                <x-adminlte-select name="producto" label="Producto" label-class="text-dark" igroup-size="lg">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fa fa-solid fa-store"></i>
                        </div>
                    </x-slot>
                    @foreach ($productos as $producto)
                        <option value={{ $producto['_id'] }}><strong>{{ $producto['nombre'] }}</strong>
                            <p>
                                @if (isset($producto['forma']))
                                    {{ $producto['forma'] }}
                                @endif
                            </p>
                        </option>
                    @endforeach

                    <!--  <button class="btn btn-success" type="submit">OK</button>-->
                </x-adminlte-select>
                <!--INPUT FOTO-->
                <label for="">Imagen</label>
                <input type="file" id="imagen" name="foto" class="form-control mx-3" style="width: 910px"
                    accept="image/*" required>
                <br>
                <br>
                <img id="imagenPrevisualizacion" style="max-height: 500px; ">
                <!--******-->

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
        const $seleccionArchivos = document.querySelector("#imagen"),
            $imagenPrevisualizacion = document.querySelector("#imagenPrevisualizacion");
        $seleccionArchivos.addEventListener("change", () => {
            // Los archivos seleccionados, pueden ser muchos o uno
            const archivos = $seleccionArchivos.files;
            // Si no hay archivos salimos de la función y quitamos la imagen
            if (!archivos || !archivos.length) {
                $imagenPrevisualizacion.src = "";
                return;
            }
            // Ahora tomamos el primer archivo, el cual vamos a previsualizar
            const primerArchivo = archivos[0];
            // Lo convertimos a un objeto de tipo objectURL
            const objectURL = URL.createObjectURL(primerArchivo);
            // Y a la fuente de la imagen le ponemos el objectURL
            $imagenPrevisualizacion.src = objectURL;

            $('#imagenPrevisualizacion').css('width', '350px');
            $('#imagenPrevisualizacion').css('border-radius', '20px');
        });
    </script>
@stop
