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
            'user_id'=>1
        ]);
        Visita::create([
            'fecha' => '2021/04/20',
            'user_id'=>2
        ]);
    }
}
