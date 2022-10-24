<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $fillable=['fecha','user_id'];
//relación inversa
    public function user(){
        return $this->belongsTo(User::class);
    }
}
