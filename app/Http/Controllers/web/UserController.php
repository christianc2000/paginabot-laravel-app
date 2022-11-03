<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use App\Models\Prospecto;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    //  public int $id=1;

    public function index()
    {
        $prospectos = Http::get('https://bottopicos.herokuapp.com/api/prospecto');

        $contactar = Http::get('https://bottopicos.herokuapp.com/api/prospecto/contactar');

        $activo = Http::get('https://bottopicos.herokuapp.com/api/pedido');
        $habitual = Http::get('https://bottopicos.herokuapp.com/api/pedido/maspedido');

        $resultado1 = json_decode($prospectos, true);
        $resultado2 = json_decode($contactar, true);
        $resultado3 = json_decode($activo, true);
        $resultado4 = json_decode($habitual, true);



        $e1 = $resultado1['prospectoInicial'];
        $e2 = $resultado2['prospectoInicial'];
        $e3 = $resultado3['pedidos'];
        $e4 = $resultado4['pedidos'];
       //return $e3;
        return view('tarjetas', compact('e1', 'e2', 'e3', 'e4'));
        // return view('prueba', compact('prI'));
        //return view('dashboard', compact('prI'));
    }

    public function comunicacion(Request $request)
    {
        //return $request;
        $response = Http::post('https://bottopicos.herokuapp.com/api/prospecto/contactar', [
            "contactar" => $request->contactar,
            "medio" => $request->comunicacion_id,
            "mensaje" => $request->mensaje,
            "prospecto" => $request->idcontactar,
            "id" => $request->id
        ]);
        return redirect()->route('user.tarjeta');
    }
    public function comunicacion2(Request $request)
    {
        //return $request;
        $response = Http::post('https://bottopicos.herokuapp.com/api/prospecto/contactar', [
            "contactar" => $request->contactar,
            "medio" => $request->comunicacion_id,
            "mensaje" => $request->mensaje,
            "prospecto" => $request->idcontactar,
            "id" => $request->id
        ]);
        return redirect()->route('home');
    }

    public function loginindex()
    {
        return view('login.login');
    }
    public function login(Request $request)
    {

        $response = Http::post('https://bottopicos.herokuapp.com/api/usuario/login', [
            "correo" => $request->email,
            "password" => $request->password,
        ]);

        if (200 == $response->status()) {
            $response = json_decode($response, true);
            //return $response;
            /* Config::set('id', $response['_id']);
           return Config::get('id');*/
            return redirect()->route('home');
        } else {
            return redirect()->route('inicial');
        }
    }
    public function inde()
    {
        return view('user.index');
    }
    public function create()
    {
        return view('user.create');
    }
    public function pedido($id)
    {
        $url = 'https://bottopicos.herokuapp.com/api/pedido/cliente/' . $id;
        $pedido = Http::get($url);
        $pedidos = json_decode($pedido, true);
        $pedidos = $pedidos['pedidoDetalleCarrito'];
       // return $pedidos;
        return view('pedido', compact('pedidos'));
    }
    public function tarjeta()
    {
        $prospectos = Http::get('https://bottopicos.herokuapp.com/api/prospecto');

        $contactar = Http::get('https://bottopicos.herokuapp.com/api/prospecto/contactar');

        $activo = Http::get('https://bottopicos.herokuapp.com/api/pedido');
        $habitual = Http::get('https://bottopicos.herokuapp.com/api/pedido/maspedido');

        $resultado1 = json_decode($prospectos, true);
        $resultado2 = json_decode($contactar, true);
        $resultado3 = json_decode($activo, true);
        $resultado4 = json_decode($habitual, true);



        $e1 = $resultado1['prospectoInicial'];
        $e2 = $resultado2['prospectoInicial'];
        $e3 = $resultado3['pedidos'];
        $e4 = $resultado4['pedidos'];
        //return $e4;
        //  $e4 = 
        // $e4 = [];

        //$e3 = Prospecto::where('estado', 3)->get();
        //$e4 = Prospecto::where('estado', 4)->get();
        //return $e4[0];
        // return view('dashboard', compact('e1', 'e2', 'e3', 'e4'));
     //   return $e4[0]['fechaUltima'][0];

        return view('dashboard', compact('e1', 'e2', 'e3', 'e4'));
      
    }
    public function store(Request $request)
    {

        $response = Http::post('https://bottopicos.herokuapp.com/api/usuario', [
            "nombre" => $request->nombre,
            "correo" => $request->correo,
            "password" => $request->password,
            "celular" => $request->celular,
            "direccion" => $request->direccion
        ]);
        return $response;
    }
    public function edit($id)
    {
    }
    public function update(Request $request, $id)
    {
    }
    public function destroy($id)
    {
    }
}
