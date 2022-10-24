<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ProspectoController extends Controller
{
    public function store(Request $request){
        $pos=1;
        $sorts=$request->get('sorts');

        foreach ($sorts as $sort) {
            $user=User::find($sort['id']);
            $user->posicion=$pos;
            $user->save();
            $pos++;
        }
    }
}
