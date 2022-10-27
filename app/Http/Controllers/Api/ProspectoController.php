<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Prospecto;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProspectoController extends Controller
{
    public function estadoUno(Request $request){
       
        $pos=1;
        $sorts=$request['sorts'];
    
        foreach ($sorts as $sort) {
            
            $user=Prospecto::find((int)$sort);
            $user->estado=1;
            $user->posicion=$pos;
            $user->save();
            $pos++;
        }
        return response()->json([
            'data'=>Prospecto::all()
        ]);
    }
    public function estadoDos(Request $request){
       
        $pos=1;
        $sorts=$request['sorts'];
    
        foreach ($sorts as $sort) {
            
            $user=Prospecto::find((int)$sort);
            $user->estado=2;
            $user->posicion=$pos;
            $user->save();
            $pos++;
        }
        return response()->json([
            'data'=>Prospecto::all()
        ]);
    }
    public function estadoTres(Request $request){
       
        $pos=1;
        $sorts=$request['sorts'];
       /* $response = Http::post('http://example.com/users', [
            'name' => 'Steve',
            'role' => 'Network Administrator',
        ]);*/
        foreach ($sorts as $sort) {
            
            $user=Prospecto::find((int)$sort);
            $user->estado=3;
            $user->posicion=$pos;
            $user->save();
            $pos++;
        }
        return response()->json([
            'data'=>Prospecto::all()
        ]);
    }
    public function estadoCuatro(Request $request){
       
        $pos=1;
        $sorts=$request['sorts'];
    
        foreach ($sorts as $sort) {
            
            $user=Prospecto::find((int)$sort);
            $user->estado=4;
            $user->posicion=$pos;
            $user->save();
            $pos++;
        }
        return response()->json([
            'data'=>Prospecto::all()
        ]);
    }
}
