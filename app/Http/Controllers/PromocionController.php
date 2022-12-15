<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Support\Facades\Storage;

class PromocionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $promociones = Http::get('https://topicos.onrender.com/api/promociones')->json();
        $promociones = Http::get('http://localhost:3000/api/promociones')->json();

        $promociones = $promociones['detalle'];

        //return $promociones;
        return view('promocion.index', compact('promociones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productos = Http::get('http://localhost:3000/api/promociones/productos')->json();
        //$productos = Http::get('https://topicos.onrender.com/api/promociones/productos')->json();
        $productos = $productos['productos'];
        //return $productos;
        return view('promocion.create', compact('productos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //  return $request->foto;
        if ($request->hasFile('foto')) {
            //$path=$request->foto->store('public');
            //$image = fopen($request->file('foto')->getPathName(), 'r');
            //return $image;
            //return base64_decode(Storage::get($path));
            //  return Storage::download($path);
            $result = $request->foto->storeOnCloudinary();
            //return $result->getPath();
            //$promocion = http::post('http://localhost:3000/api/promociones/crear', [
             $promocion = http::post('https://topicos.onrender.com/api/promociones/crear', [
                'nombre' => $request->nombre,
                'descripcion' => $request->descripcion,
                'cantidadSillas' => $request->cantidadSillas,
                'cantidadMesas' => $request->cantidadMesas,
                'descuento' => $request->descuento,
                'producto' => $request->producto,
                'imagen' =>  $result->getPath()
            ]);
            session()->flash('crear-promocion', '¡Se creó correctamente la promoción!');
        } else {
            return "no es una foto";
        }
        return redirect()->route('promocion.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function eliminar($id)
    {
        // $url='https://topicos.onrender.com/api/promociones/eliminar/'.$id;
        $url = 'http://localhost:3000/api/promociones/eliminar/' . $id;
        $promocion = http::post($url);
        session()->flash('eliminar-promocion', '¡Se eliminó correctamente la promoción!');

        return redirect()->route('promocion.index');
    }
    public function destroy($id)
    {
    }
}
