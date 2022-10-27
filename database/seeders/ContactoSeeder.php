<?php

namespace Database\Seeders;

use App\Models\Contacto;
use Illuminate\Database\Seeder;

class ContactoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Contacto::create([
            'contactar'=>'Luisa',
            'medio'=>'1',
            'mensaje'=>'Todos lo precios son buenos',
            'fecha'=>'2022-12-03',
            'hora'=>'12:00:00',
            'prospecto_id'=>4,
            'user_id'=>1,
        ]);
    }
}
