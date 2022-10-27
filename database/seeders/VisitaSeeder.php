<?php

namespace Database\Seeders;

use App\Models\Visita;
use Illuminate\Database\Seeder;

class VisitaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Visita::create([
            'fecha' => '2021/03/21',
            'prospecto_id'=>1
        ]);
        Visita::create([
            'fecha' => '2021/04/20',
            'prospecto_id'=>2
        ]);
        Visita::create([
            'fecha' => '2021/03/21',
            'prospecto_id'=>3
        ]);
        Visita::create([
            'fecha' => '2021/04/20',
            'prospecto_id'=>4
        ]);
        Visita::create([
            'fecha' => '2021/03/21',
            'prospecto_id'=>5
        ]);
        Visita::create([
            'fecha' => '2021/04/20',
            'prospecto_id'=>6
        ]);
        Visita::create([
            'fecha' => '2021/03/21',
            'prospecto_id'=>7
        ]);
        Visita::create([
            'fecha' => '2021/04/20',
            'prospecto_id'=>8
        ]);
    }
}
