<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prospecto extends Model
{
    use HasFactory;
    protected $fillable=[
        'facebookid',
        'foto',
        'name',
        'celular',
        'estado',
        'posicion',
    ];
    public function visitas(){
        return $this->hasMany(Visita::class);
    }
    public function cliente(){
        return $this->hasOne(Cliente::class);
    }
    public function contactos(){
        return $this->hasMany(Contacto::class);
    }
}
