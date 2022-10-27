<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    use HasFactory;
    protected $fillable=[
    'contactar',
    'medio',
    'mensaje',
    'fecha',
    'hora',
    'prospecto_id',
    'user_id',
    ];
    public function prospecto(){
        return $this->belongsTo(Prospecto::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
