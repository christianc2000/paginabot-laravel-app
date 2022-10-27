<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Prospecto;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    public function index()
    {
        $prospectos = Http::get('https://bottopicos.herokuapp.com/api/prospecto');
        $contactar = Http::get('https://bottopicos.herokuapp.com/api/prospecto/contactar');
        /*  $prospectos = json_decode($prospectos, true)->toArray();
        return $prospectos;*/

        $resultado1 = json_decode($prospectos,true);
        $resultado2 = json_decode($contactar,true);
     
        // Vemos el resultado de la decodificación:
        //return $resultado;
       /* $prI = $resultado1['prospectoInicial'];
        return $prI;*/
        $e1 = $resultado1['prospectoInicial'];
        $e2 = $resultado2['prospectoInicial'];
        $e3 = [];
        $e4 = [];
       /* foreach ($prI as $p) {
            if ($p['prospecto']['estado'] == 1) {
                array_push($e1, $p);
            }
            if ($p['prospecto']['estado'] == 2) {
                array_push($e2, $p);
            }
        }
        return $e2;*/

        // return $prospectos['prospectoInicial'];
        //return $prI->first();
        /*$e1 = Prospecto::where('estado', 1)->orderBy('posicion', 'asc')->get();
        $e2 = Prospecto::where('estado', 2)->orderBy('posicion', 'asc')->get();
        $e3 = Prospecto::where('estado', 3)->orderBy('posicion', 'asc')->get();
        $e4 = Prospecto::where('estado', 4)->orderBy('posicion', 'asc')->get();*/
        //return $e2;
        return view('dashboard', compact('e1', 'e2', 'e3', 'e4'));
        // return view('prueba', compact('prI'));
        //return view('dashboard', compact('prI'));
    }

    public function comunicacion(Request $request)
    {
        return $request;
    }
}
